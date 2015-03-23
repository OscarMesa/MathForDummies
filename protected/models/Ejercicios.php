<?php

/**
 * This is the model class for table "ejercicios".
 *
 * The followings are the available columns in table 'ejercicios':
 * @property integer $id_ejercicio
 * @property string $state_ejercicios
 * @property string $ejercicio
 * @property integer $idusuariocreador
 * @property integer $idDificultad
 * @property integer $idMateria
 * @property string $visible
 *
 * The followings are the available model relations:
 * @property Dificultad $idDificultad0
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
			array('ejercicio,visible, idMateria', 'required'),
			array('idusuariocreador, idDificultad,idMateria', 'numerical', 'integerOnly'=>true),
			array('state_ejercicios', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_ejercicio, state_ejercicios, ejercicio, idusuariocreador, idDificultad, idMateria', 'safe', 'on'=>'search'),
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
			'materia' => array(self::BELONGS_TO, 'Materias', 'idMateria'),
                        'ejercicio_evaluacion' => array(self::HAS_MANY,'EjerciciosEvaluaciones','ejercicios_id_ejercicio'),
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
			'id_ejercicio' => 'Id Ejercicio',
			'state_ejercicios' => 'State Ejercicios',
			'ejercicio' => 'Ejercicio',
			'idusuariocreador' => 'Idusuariocreador',
			'idDificultad' => 'Id Dificultad',
                        'idMateria' => 'Materia',
                        'visible' => 'Visible' 
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
		$criteria->compare('ejercicio',$this->ejercicio,true);
		$criteria->compare('idusuariocreador',$this->idusuariocreador);
		$criteria->compare('idDificultad',$this->idDificultad);
		$criteria->compare('idMateria',$this->idMateria);
		$criteria->compare('visible',$this->visible);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
}
