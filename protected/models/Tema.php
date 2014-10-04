<?php

/**
 * This is the model class for table "tema".
 *
 * The followings are the available columns in table 'tema':
 * @property integer $idtema
 * @property string $descripcion
 * @property string $titulo
 * @property integer $idcurso
 * @property integer $idperiodo
 * 
 * The followings are the available model relations:
 * @property Cursos $idcurso0
 */
class Tema extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tema';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcurso,idperiodo,titulo', 'required'),
			array('idtema, idcurso,idperiodo', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>1000),
			array('titulo', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idtema, descripcion, idcurso,idperiodo', 'safe', 'on'=>'search'),
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
			'curso' => array(self::BELONGS_TO, 'Cursos', 'idcurso'),
			'periodo' => array(self::BELONGS_TO, 'Periodo', 'idperiodo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'titulo' => 'Titulo',
			'idtema' => 'Id',
			'descripcion' => 'Descripcion',
			'idcurso' => 'Curso',
                        'idperiodo' => 'Período'
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

		$criteria->compare('titulo',$this->titulo);
		$criteria->compare('idtema',$this->idtema);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('idcurso',$this->idcurso);
		$criteria->compare('idperiodo',$this->idperiodo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tema the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
