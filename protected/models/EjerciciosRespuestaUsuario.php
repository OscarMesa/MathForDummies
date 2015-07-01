<?php

/**
 * This is the model class for table "ejercicios_respuesta_usuario".
 *
 * The followings are the available columns in table 'ejercicios_respuesta_usuario':
 * @property integer $ejercicios_respuesta_usuario_id
 * @property integer $id_respuesta
 * @property integer $id_usuario
 * @property integer $evaluacion_integrante_id
 *
 * The followings are the available model relations:
 * @property Respuestaejercicio $idRespuesta
 * @property MathUser $idUsuario
 * @property EvaluacionIntegrante $evaluacionIntegrante
 */
class EjerciciosRespuestaUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ejercicios_respuesta_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_respuesta, id_usuario, evaluacion_integrante_id', 'required'),
			array('id_respuesta, id_usuario, evaluacion_integrante_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ejercicios_respuesta_usuario_id, id_respuesta, id_usuario, evaluacion_integrante_id', 'safe', 'on'=>'search'),
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
			'idRespuesta' => array(self::BELONGS_TO, 'Respuestaejercicio', 'id_respuesta'),
			'idUsuario' => array(self::BELONGS_TO, 'MathUser', 'id_usuario'),
			'evaluacionIntegrante' => array(self::BELONGS_TO, 'EvaluacionIntegrante', 'evaluacion_integrante_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ejercicios_respuesta_usuario_id' => 'Ejercicios Respuesta Usuario',
			'id_respuesta' => 'Id Respuesta',
			'id_usuario' => 'Id Usuario',
			'evaluacion_integrante_id' => 'Evaluacion Integrante',
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

		$criteria->compare('ejercicios_respuesta_usuario_id',$this->ejercicios_respuesta_usuario_id);
		$criteria->compare('id_respuesta',$this->id_respuesta);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('evaluacion_integrante_id',$this->evaluacion_integrante_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EjerciciosRespuestaUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
