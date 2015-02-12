<?php

/**
 * This is the model class for table "integrantes_curso".
 *
 * The followings are the available columns in table 'integrantes_curso':
 * @property integer $id
 * @property string $state_integrantes_curso
 * @property integer $cursos_id
 * @property integer $id_integrante
 * @property string $fecha_registro
 * @property integer $estado
 *
 * The followings are the available model relations:
 * @property Cursos $cursos
 * @property MathUser $idIntegrante
 */
class IntegrantesCurso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'integrantes_curso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cursos_id, id_integrante, fecha_registro, estado', 'required'),
			array('cursos_id, id_integrante, estado', 'numerical', 'integerOnly'=>true),
			array('state_integrantes_curso', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, state_integrantes_curso, cursos_id, id_integrante, fecha_registro, estado', 'safe', 'on'=>'search'),
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
			'cursos' => array(self::BELONGS_TO, 'Cursos', 'cursos_id'),
			'idIntegrante' => array(self::BELONGS_TO, 'MathUser', 'id_integrante'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'state_integrantes_curso' => 'State Integrantes Curso',
			'cursos_id' => 'Cursos',
			'id_integrante' => 'Id Integrante',
			'fecha_registro' => 'Fecha Registro',
			'estado' => 'Estado',
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
		$criteria->compare('state_integrantes_curso',$this->state_integrantes_curso,true);
		$criteria->compare('cursos_id',$this->cursos_id);
		$criteria->compare('id_integrante',$this->id_integrante);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IntegrantesCurso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
