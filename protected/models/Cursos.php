<?php

/**
 * This is the model class for table "cursos".
 *
 * The followings are the available columns in table 'cursos':
 * @property integer $id
 * @property string $state_curso
 * @property integer $id_docente
 * @property integer $idmateria
 * @property string $nombre_curso
 * @property string $descripcion_curso
 * @property string $fecha_inicio
 * @property string $fecha_cierre
 */
class Cursos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cursos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idmateria, descripcion_curso, state_curso, nombre_curso, fecha_inicio, fecha_cierre', 'required'),
			array('idmateria', 'numerical', 'integerOnly'=>true),
			array('state_curso', 'length', 'max'=>8),
			array('nombre_curso', 'length', 'max'=>45),
			array('fecha_inicio', 'safe'),
			array('fecha_cierre', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, state_curso, idmateria, nombre_curso, descripcion_curso,fecha_inicio, fecha_cierre', 'safe', 'on'=>'search'),
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
                    'usuario' => array(self::BELONGS_TO, 'Usuarios', 'id_docente'),
                    'materia' => array(self::BELONGS_TO, 'Materias', 'idmateria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'state_curso' => 'Estado Curso',
			//'id_docente' => 'Id Docente',
			'idmateria' => 'Area del Curso',
			'nombre_curso' => 'Nombre Curso',
			'descripcion_curso' => 'Descripcion Curso',
			'fecha_inicio' => 'Fecha Inicio Curso',
			'fecha_cierre' => 'Fecha Cierre Curso',
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

		//$criteria->compare('id',$this->id);
		//$criteria->compare('state_curso',$this->state_curso,true);
		//$criteria->compare('id_docente',$this->id_docente);
		$criteria->compare('idmateria',$this->idmateria);
		$criteria->compare('nombre_curso',$this->nombre_curso,true);
		$criteria->compare('descripcion_curso',$this->descripcion_curso,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_cierre',$this->fecha_cierre,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cursos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
