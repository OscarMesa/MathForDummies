<?php

/**
 * This is the model class for table "contenidos_ejercicio".
 *
 * The followings are the available columns in table 'contenidos_ejercicio':
 * @property integer $contenidos_id
 * @property string $state_ce
 * @property integer $ejercicios_id
 * @property integer $orden
 */
class ContenidosEjercicio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contenidos_ejercicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contenidos_id, ejercicios_id, orden', 'required'),
			array('contenidos_id, ejercicios_id, orden', 'numerical', 'integerOnly'=>true),
			array('state_ce', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('contenidos_id, state_ce, ejercicios_id, orden', 'safe', 'on'=>'search'),
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
			'contenidos_id' => 'Contenidos',
			'state_ce' => 'State Ce',
			'ejercicios_id' => 'Ejercicios',
			'orden' => 'Orden',
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

		$criteria->compare('contenidos_id',$this->contenidos_id);
		$criteria->compare('state_ce',$this->state_ce,true);
		$criteria->compare('ejercicios_id',$this->ejercicios_id);
		$criteria->compare('orden',$this->orden);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ContenidosEjercicio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}