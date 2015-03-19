<?php

/**
 * This is the model class for table "evaluacion".
 *
 * The followings are the available columns in table 'evaluacion':
 * @property integer $cursos_id
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $porcentaje
 * @property string $tiempo_limite
 * @property integer $estado_evaluación
 * @property integer $tipo_evaluacion_id
 *
 * The followings are the available model relations:
 * @property Cursos $cursos
 */
class Evaluacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evaluacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cursos_id,porcentaje,tiempo_limite,tipo_evaluacion_id', 'required'),
                        array('fecha_inicio','required','message'=>'El rango de fecha es requerido'),
			array('cursos_id, estado_evaluación', 'numerical', 'integerOnly'=>true),
                        array('porcentaje', 'match', 'pattern'=>'(/^\d*\.?\d*[0-9]+\d*$)|(^[0-9]+\d*\.\d*$)/'),
			array('porcentaje', 'length', 'max'=>10),
			array('fecha_inicio, fecha_fin, tiempo_limite', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cursos_id, fecha_inicio, fecha_fin, porcentaje, tiempo_limite, estado_evaluación', 'safe', 'on'=>'search'),
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
			'curso' => array(self::BELONGS_TO, 'Cursos', 'cursos_id'),
			'tipo' => array(self::BELONGS_TO, 'TipoEvaluacion', 'cursos_id'),
			'temas_evaluacion' => array(self::HAS_MANY, 'TemaEvaluaciones', 'evaluaciones_id'),
                       
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cursos_id' => 'Cursos',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'porcentaje' => 'Porcentaje',
			'tiempo_limite' => 'Tiempo Limite',
			'estado_evaluación' => 'Estado Evaluación',
			'tipo_evaluacion_id' => 'Tipo de evaluación',
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
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('porcentaje',$this->porcentaje,true);
		$criteria->compare('tiempo_limite',$this->tiempo_limite,true);
		$criteria->compare('estado_evaluación',$this->estado_evaluación);
		$criteria->compare('tipo_evaluacion_id',$this->tipo_evaluacion_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Evaluacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
