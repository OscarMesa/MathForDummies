<?php

/**
 * This is the model class for table "seguimiento_usuario_curso".
 *
 * The followings are the available columns in table 'seguimiento_usuario_curso':
 * @property integer $id
 * @property integer $id_curso
 * @property integer $id_usuario
 * @property integer $id_tipo_nota
 * @property integer $porcentaje
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property TipoNota $idTipoNota
 * @property Cursos $idCurso
 * @property MathUser $idUsuario
 */
class SeguimientoUsuarioCurso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'seguimiento_usuario_curso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curso, id_usuario, id_tipo_nota, porcentaje, descripcion', 'required'),
			array('id_curso, id_usuario, id_tipo_nota, porcentaje', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_curso, id_usuario, id_tipo_nota, porcentaje, descripcion', 'safe', 'on'=>'search'),
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
			'idTipoNota' => array(self::BELONGS_TO, 'TipoNota', 'id_tipo_nota'),
			'idCurso' => array(self::BELONGS_TO, 'Cursos', 'id_curso'),
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
			'id_curso' => 'Id Curso',
			'id_usuario' => 'Id Usuario',
			'id_tipo_nota' => 'Id Tipo Nota',
			'porcentaje' => 'Porcentaje',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_curso',$this->id_curso);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_tipo_nota',$this->id_tipo_nota);
		$criteria->compare('porcentaje',$this->porcentaje);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SeguimientoUsuarioCurso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
