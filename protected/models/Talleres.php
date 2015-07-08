<?php

/**
 * This is the model class for table "talleres".
 *
 * The followings are the available columns in table 'talleres':
 * @property integer $idtalleres
 * @property string $state_taller
 * @property integer $id_materia
 * @property integer $id_curso
 * @property string $nombre
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Cursos $idCurso
 * @property Materias $idMateria
 * @property array $ejercicios
 */
class Talleres extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'talleres';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_materia, id_curso, nombre, descripcion', 'required'),
			array('id_materia, id_curso', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			array('ejercicios', 'ValidarExistenciaEjericicos'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_materia, id_curso, nombre, descripcion,ejercicios', 'safe', 'on'=>'search'),

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
			'idCurso' => array(self::BELONGS_TO, 'Cursos', 'id_curso'),
			'idMateria' => array(self::BELONGS_TO, 'Materias', 'id_materia'),
			'Contenidos' => array(self::MANY_MANY, 'Contenidos', 'contenidos_talleres(talleres_idtalleres,contenidos_id)'),
			'ejerciciosTaller'=> array(self::MANY_MANY, 'Ejercicios', 'ejercicios_talleres(ejercicios_id_ejercicio,talleres_idtalleres)')
		);
	}

    public function ValidarExistenciaEjericicos($attribute, $params) {
        if ( property_exists($this, 'ejercicios') && count($this->ejercicios['check']) <= 0 && $this->tipo_evaluacion_id == self::TP_EVL_VIRTUAL)
            $this->addError($attribute, Yii::t('polimsn', 'You must select at least one exercise for creating evaluation.'));
    }


	/**
	 * @return array customized attribute labels (name=>label)
	 */
        
	public function attributeLabels()
	{
		return array(
			'id_materia' => 'Materia',
			'state_taller' => 'Estado',
			'id_curso' => 'Curso',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('idtalleres',$this->idtalleres);
		$criteria->compare('id_materia',$this->id_materia);
		$criteria->compare('id_curso',$this->id_curso);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function setEjercicios($ejercicios) {
        $this->ejercicios = $ejercicios;
    }
 
    public function guardarEjercicios() {
        
        EjerciciosTalleres::model()->deleteAll(array(
            'condition' => 'talleres_idtalleres=?',
            'params' => array($this->idtalleres)
                )
        );

        if(property_exists($this,"ejercicios") && $this->tipo_evaluacion_id == self::TP_EVL_VIRTUAL){

            foreach ($this->ejercicios['check'] as $ejercicio) {
                $n = new EjerciciosEvaluaciones();
                $n->ejercicios_id_ejercicio = $ejercicio;
                $n->evaluaciones_id = $this->id_evaluacion;
                if(!$n->save()){
                    print_r($n->errors);die;
                }
            }
        }
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Talleres the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
