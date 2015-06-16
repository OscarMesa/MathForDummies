<?php

/**
 * This is the model class for table "ejercicios".
 *
 * The followings are the available columns in table 'ejercicios':
 * @property integer $id_ejercicio
 * @property string $state_ejercicios
 * @property integer $idMateria
 * @property string $ejercicio
 * @property integer $idusuariocreador
 * @property integer $idDificultad
 * @property string $visible
 * @property array $contenidos
 *
 * The followings are the available model relations:
 * @property Dificultad $idDificultad0
 * @property Materias $idMateria0
 * @property MathUser $idusuariocreador0
 * @property Evaluacion[] $evaluacions
 */
class Ejercicios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ejercicios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ejercicio', 'required'),
			array('idMateria, idusuariocreador, idDificultad', 'numerical', 'integerOnly'=>true),
			array('state_ejercicios', 'length', 'max'=>8),
			array('visible', 'length', 'max'=>7),
			array("contenidos","safe"),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_ejercicio, state_ejercicios, idMateria, ejercicio, idusuariocreador, idDificultad, visible', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idDificultad0' => array(self::BELONGS_TO, 'Dificultad', 'idDificultad'),
			'contenidos_ejercicios' => array(self::HAS_MANY, 'ContenidosEjercicio', 'ejercicios_id'),
			'idMateria0' => array(self::BELONGS_TO, 'Materias', 'idMateria'),
			'idusuariocreador0' => array(self::BELONGS_TO, 'MathUser', 'idusuariocreador'),
			'evaluacions' => array(self::MANY_MANY, 'Evaluacion', 'ejercicios_evaluaciones(ejercicios_id_ejercicio, evaluaciones_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_ejercicio' => 'ID',
			'state_ejercicios' => 'Estado',
			'idMateria' => 'Materia',
			'ejercicio' => 'Resumen',
			'idusuariocreador' => 'Creador',
			'idDificultad' => 'Nivel de Dificultad',
			'visible' => 'Privacidad',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_ejercicio',$this->id_ejercicio);
		$criteria->compare('state_ejercicios',$this->state_ejercicios,true);
		$criteria->compare('idMateria',$this->idMateria);
		$criteria->compare('ejercicio',$this->ejercicio,true);
		$criteria->compare('idusuariocreador',$this->idusuariocreador);
		$criteria->compare('idDificultad',$this->idDificultad);
		$criteria->compare('visible',$this->visible,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ejercicios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
    public function searchForEvaluacion()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_ejercicio',$this->id_ejercicio);
		$criteria->compare('state_ejercicios',$this->state_ejercicios,true);
		$criteria->compare('ejercicio',$this->ejercicio,true);
		$criteria->compare('idDificultad',$this->idDificultad);
		$criteria->compare('idMateria',$this->idMateria);
		$criteria->addCondition('visible="publico"');
		$criteria->addCondition('(visible="privado" AND idusuariocreador = "'.$this->idusuariocreador.'")','OR');
                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
         public function cargarMisRespuestas()
	{
		$criteria=new CDbCriteria;
                $criteria->order = "ordenposicion";
		$criteria->compare('id_ejercicio',$this->id_ejercicio);
		$criteria->compare('estado_respuesta',ACTIVE);
		return new CActiveDataProvider(new Respuestaejercicio(), array(
			'criteria'=>$criteria,
		));
	}

    public function getContenidos() {
        return $this->contenidos;
    }

    public function setContenidos($contenidos) {
        $this->contenidos = $contenidos;
    }

    public function guardarContenidos(){
        ContenidosEjercicio::model()->deleteAll(array(
            'condition' => 'ejercicios_id=?',
            'params' => array($this->id_ejercicio)
            )
        );
        
//        print_r($this->contenidos);die;
        if(property_exists($this,"contenidos")){
            foreach ($this->contenidos['check'] as $contenido) {
                $n = new ContenidosEjercicio();
                $n->contenidos_id = $contenido;
                $n->ejercicios_id = $this->id_ejercicio;
                $n->orden = $this->contenidos['orden'][$contenido];
                if(!$n->save()){
                    $this->addErrors($n->errors);
                    throw new Exception('A ocurrido un error');
                }
            }
        }
        
    }

}
