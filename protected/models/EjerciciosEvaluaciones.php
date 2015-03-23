<?php

/**
 * This is the model class for table "ejercicios_evaluaciones".
 *
 * The followings are the available columns in table 'ejercicios_evaluaciones':
 * @property integer $ejercicios_id_ejercicio
 * @property integer $evaluaciones_id
 * @property double $valoracion_porcentaje
 */
class EjerciciosEvaluaciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ejercicios_evaluaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ejercicios_id_ejercicio, evaluaciones_id', 'required'),
			array('ejercicios_id_ejercicio, evaluaciones_id', 'numerical', 'integerOnly'=>true),
			array('valoracion_porcentaje', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ejercicios_id_ejercicio, evaluaciones_id, valoracion_porcentaje', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ejercicios_id_ejercicio' => 'Ejercicios Id Ejercicio',
			'evaluaciones_id' => 'Evaluaciones',
			'valoracion_porcentaje' => 'Valoracion Porcentaje',
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

		$criteria->compare('ejercicios_id_ejercicio',$this->ejercicios_id_ejercicio);
		$criteria->compare('evaluaciones_id',$this->evaluaciones_id);
		$criteria->compare('valoracion_porcentaje',$this->valoracion_porcentaje);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EjerciciosEvaluaciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
