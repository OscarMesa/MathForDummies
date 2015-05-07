<?php

/**
 * This is the model class for table "nota_seguimiento_usuario".
 *
 * The followings are the available columns in table 'nota_seguimiento_usuario':
 * @property integer $id
 * @property integer $id_usuario
 * @property integer $id_seguimiento_usuario_curso
 * @property double $nota
 * @property string $observacion
 *
 * The followings are the available model relations:
 * @property SeguimientoUsuarioCurso $idSeguimientoUsuarioCurso
 * @property MathUser $idUsuario
 */
class NotaSeguimientoUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'nota_seguimiento_usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_seguimiento_usuario_curso, nota, observacion', 'required'),
			array('id_usuario, id_seguimiento_usuario_curso', 'numerical', 'integerOnly'=>true),
			array('nota', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_usuario, id_seguimiento_usuario_curso, nota, observacion', 'safe', 'on'=>'search'),
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
			'idSeguimientoUsuarioCurso' => array(self::BELONGS_TO, 'SeguimientoUsuarioCurso', 'id_seguimiento_usuario_curso'),
			'idUsuario' => array(self::BELONGS_TO, 'MathUser', 'id_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_usuario' => 'Id Usuario',
			'id_seguimiento_usuario_curso' => 'Id Seguimiento Usuario Curso',
			'nota' => 'Nota',
			'observacion' => 'Observacion',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_seguimiento_usuario_curso',$this->id_seguimiento_usuario_curso);
		$criteria->compare('nota',$this->nota);
		$criteria->compare('observacion',$this->observacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NotaSeguimientoUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
