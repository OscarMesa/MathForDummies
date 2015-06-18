<?php

/**
 * This is the model class for table "evaluacion_integrante".
 *
 * The followings are the available columns in table 'evaluacion_integrante':
 * @property integer $evaluacion_integrante_id
 * @property integer $id_evaluacion
 * @property string $state_evalucacion_integrante
 * @property integer $id_integrante_curso
 * @property string $fecha_inicio
 * @property string $fecha_fin
 *
 * The followings are the available model relations:
 * @property Evaluacion $idEvaluacion
 * @property MathUser $idIntegranteCurso
 */
class EvaluacionIntegrante extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evaluacion_integrante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_evaluacion, id_integrante_curso', 'required'),
			array('evaluacion_integrante_id, id_evaluacion, id_integrante_curso', 'numerical', 'integerOnly'=>true),
			array('state_evalucacion_integrante', 'length', 'max'=>8),
			array('fecha_inicio, fecha_fin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('evaluacion_integrante_id, id_evaluacion, state_evalucacion_integrante, id_integrante_curso, fecha_inicio, fecha_fin', 'safe', 'on'=>'search'),
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
			'idEvaluacion' => array(self::BELONGS_TO, 'Evaluacion', 'id_evaluacion'),
			'idIntegranteCurso' => array(self::BELONGS_TO, 'MathUser', 'id_integrante_curso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'evaluacion_integrante_id' => 'Evaluacion Integrante',
			'id_evaluacion' => 'Id Evaluacion',
			'state_evalucacion_integrante' => 'State Evalucacion Integrante',
			'id_integrante_curso' => 'Id Integrante Curso',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
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

		$criteria->compare('evaluacion_integrante_id',$this->evaluacion_integrante_id);
		$criteria->compare('id_evaluacion',$this->id_evaluacion);
		$criteria->compare('state_evalucacion_integrante',$this->state_evalucacion_integrante,true);
		$criteria->compare('id_integrante_curso',$this->id_integrante_curso);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EvaluacionIntegrante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
