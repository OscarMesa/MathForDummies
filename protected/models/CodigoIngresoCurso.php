<?php

/**
 * This is the model class for table "codigo_ingreso_curso".
 *
 * The followings are the available columns in table 'codigo_ingreso_curso':
 * @property integer $id_codigo
 * @property string $codigo_verficacion
 * @property integer $id_curso
 * @property string $fecha_creacion
 * @property integer $estado
 *
 * The followings are the available model relations:
 * @property Cursos $idCurso
 * @property Estados $estado0
 */
class CodigoIngresoCurso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'codigo_ingreso_curso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigo_verficacion, id_curso, fecha_creacion', 'required'),
			array('id_curso, estado', 'numerical', 'integerOnly'=>true),
			array('codigo_verficacion', 'length', 'max'=>15),
                        array('codigo_verficacion','uniqueCodigo', 'on'=>'insert'),
                        array('codigo_verficacion','uniqueCodigoUpdate', 'on'=>'update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_codigo, codigo_verficacion, id_curso, fecha_creacion, estado', 'safe', 'on'=>'search'),
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
			'idCurso' => array(self::BELONGS_TO, 'Cursos', 'id_curso'),
			'estado0' => array(self::BELONGS_TO, 'Estados', 'estado'),
		);
	}
        
        public function uniqueCodigo($attribute,$params){
            if($this->find('id_curso=? AND codigo_verficacion=?', array($this->id_curso,  $this->codigo_verficacion)) != NULL)
            {
                $this->addError($attribute, Yii::t('polimsn','This code is not available for this course, please try another difetente'));
            }
        }
        
        public function uniqueCodigoUpdate($attribute,$params)
        {
            $r = CodigoIngresoCurso::model()->findByPk($this->id_codigo);
            if($r->codigo_verficacion != $this->codigo_verficacion){
                $this->uniqueCodigo($attribute,$params);
            }
        }
        /**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_codigo' => 'Id Codigo',
			'codigo_verficacion' => 'Codigo Verficacion',
			'id_curso' => 'Id Curso',
			'fecha_creacion' => 'Fecha Creacion',
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

		$criteria->compare('id_codigo',$this->id_codigo);
		$criteria->compare('codigo_verficacion',$this->codigo_verficacion,true);
		$criteria->compare('id_curso',$this->id_curso);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('estado',$this->estado);
                
                $criteria->order = "fecha_creacion DESC";
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CodigoIngresoCurso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
