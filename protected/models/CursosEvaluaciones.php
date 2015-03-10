<?php

/**
 * This is the model class for table "cursos_evaluaciones".
 *
 * The followings are the available columns in table 'cursos_evaluaciones':
 * @property integer $cursos_id
 * @property integer $evaluaciones_id
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $porcentaje
 * @property string $tiempo_limite
 */
class CursosEvaluaciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cursos_evaluaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cursos_id, evaluaciones_id', 'required'),
			array('cursos_id, evaluaciones_id', 'numerical', 'integerOnly'=>true),
			array('porcentaje', 'length', 'max'=>10),
			array('fecha_inicio, fecha_fin, tiempo_limite', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cursos_id, evaluaciones_id, fecha_inicio, fecha_fin, porcentaje, tiempo_limite', 'safe', 'on'=>'search'),
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
			'cursos_id' => 'Cursos',
			'evaluaciones_id' => 'Evaluaciones',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'porcentaje' => 'este es el porcentaje del examen con relacion al curso',
			'tiempo_limite' => 'Tiempo Limite',
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

		$criteria->compare('cursos_id',$this->cursos_id);
		$criteria->compare('evaluaciones_id',$this->evaluaciones_id);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('porcentaje',$this->porcentaje,true);
		$criteria->compare('tiempo_limite',$this->tiempo_limite,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CursosEvaluaciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
