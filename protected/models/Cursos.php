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
 * @property int $tiene_foro booleano que indica si tiene o no un curso.
 * @property int $id_grado entero que informa a que grado se vincula el curso.
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
			array('idmateria, descripcion_curso, state_curso, nombre_curso,id_grado', 'required'),
                        array('fecha_inicio','required','message'=>'El rango de fecha es necesario.'),
                        array('fecha_inicio','compararFechaFin'),
			array('idmateria', 'numerical', 'integerOnly'=>true),
			array('state_curso', 'length', 'max'=>8),
			array('nombre_curso', 'length', 'max'=>45),
			array('fecha_inicio', 'safe'),
			array('fecha_cierre,tiene_foro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_grado,tiene_foro, id, state_curso, idmateria, nombre_curso, descripcion_curso,fecha_inicio, fecha_cierre', 'safe', 'on'=>'search'),
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
                    'usuario' => array(self::BELONGS_TO, 'CrugeStoredUser', 'id_docente'),
                    'participantes'=>array(self::MANY_MANY, 'MathUser', 'integrantes_curso(cursos_id,id_integrante)'),
                    'materia' => array(self::BELONGS_TO, 'Materias', 'idmateria'),
                    'grado' => array(self::BELONGS_TO, 'Grado', 'id_grado'),
                    'temas' => array(self::HAS_MANY, 'Tema', 'idcurso'),
                    'seguimientos' => array(self::HAS_MANY, 'SeguimientoUsuarioCurso', 'id_curso'),
		);
	}
        
        public function compararFechaFin($attribute,$params)
        {
//            echo $this->fecha_inicio.'<br/>';
//            echo $this->fecha_cierre.'<br/>';
           // exit();
            if($this->_getUnix($this->fecha_inicio) > $this->_getUnix($this->fecha_cierre))
            {
                 $this->addError($attribute, 'La fecha de inicio no puede ser mayor que la fecha de cierre.');
                 echo 'hello este es el error.';exit();
            }
        
        }
        
        public function _getUnix($fecha){
		//separamos los valores de la fecha
		list($año,$mes,$dia) = explode('-',$fecha);
                //echo 'dia'.$año;exit();
		//redefinimos la variable $fecha y le almacenamos el valor unix
		return $fecha = mktime(0,0,0,(int)$mes,(int)$dia,(int)$año);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Identificador',
			'state_curso' => 'Estado Curso',
			//'id_docente' => 'Id Docente',
			'idmateria' => 'Asignatura',
			'nombre_curso' => 'Nombre Curso',
			'descripcion_curso' => 'Descripcion Curso',
			'fecha_inicio' => 'Fecha Inicio Curso',
			'fecha_cierre' => 'Fecha Cierre Curso',
                        'tiene_foro' => 'Cuenta con foro',
                        'id_grado' => 'Grado',
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
//		$criteria->compare('state_curso','active',true);
		//$criteria->compare('id_docente',$this->id_docente);
		$criteria->compare('idmateria',$this->idmateria);
		$criteria->compare('nombre_curso',$this->nombre_curso,true);
		$criteria->compare('descripcion_curso',$this->descripcion_curso,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_cierre',$this->fecha_cierre,true);
		$criteria->compare('tiene_foro',$this->tiene_foro,true);
		$criteria->compare('id_grado',$this->id_grado,true);
                
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
