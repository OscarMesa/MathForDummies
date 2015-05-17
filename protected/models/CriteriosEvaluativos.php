<?php

/**
 * This is the model class for table "criterios_evaluativos".
 *
 * The followings are the available columns in table 'criterios_evaluativos':
 * @property integer $id_criterio
 * @property string $nombre_criterio
 * @property integer $porcentaje_criterio
 *
 * The followings are the available model relations:
 * @property SeguimientoUsuarioCurso[] $seguimientoUsuarioCursos
 */
class CriteriosEvaluativos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'criterios_evaluativos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_criterio, porcentaje_criterio', 'required'),
			array('porcentaje_criterio', 'numerical', 'integerOnly'=>true),
			array('nombre_criterio', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_criterio, nombre_criterio, porcentaje_criterio', 'safe', 'on'=>'search'),
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
			'seguimientoUsuarioCursos' => array(self::HAS_MANY, 'SeguimientoUsuarioCurso', 'criterio_evaluacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_criterio' => 'Id Criterio',
			'nombre_criterio' => 'Nombre Criterio',
			'porcentaje_criterio' => 'Porcentaje Criterio',
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

		$criteria->compare('id_criterio',$this->id_criterio);
		$criteria->compare('nombre_criterio',$this->nombre_criterio,true);
		$criteria->compare('porcentaje_criterio',$this->porcentaje_criterio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CriteriosEvaluativos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
