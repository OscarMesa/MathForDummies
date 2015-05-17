<?php

/**
 * This is the model class for table "seguimiento_usuario_curso".
 *
 * The followings are the available columns in table 'seguimiento_usuario_curso':
 * @property integer $id
 * @property stirng $nombre_seguimiento
 * @property integer $id_curso
 * @property integer $id_usuario
 * @property integer $id_tipo_nota
 * @property integer $criterio_evaluacion 
 * @property integer $porcentaje
 * @property integer $estado_seguimiento
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property TipoNota $idTipoNota
 * @property Cursos $idCurso
 * @property MathUser $idUsuario
 */
class SeguimientoUsuarioCurso extends CActiveRecord
{
        public $porcentaje_r;
        public $totalSuma;
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
			array('criterio_evaluacion, id_curso, id_usuario, id_tipo_nota, porcentaje, descripcion,nombre_seguimiento', 'required'),
			array('id_curso, id_usuario, id_tipo_nota, porcentaje', 'numerical', 'integerOnly'=>true),
			array('porcentaje','validarPorcenje'),
                        // The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_curso, id_usuario, id_tipo_nota, porcentaje, descripcion, estado_seguimiento', 'safe', 'on'=>'search'),
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
			'criterioEvaluacion' => array(self::BELONGS_TO, 'CriteriosEvaluativos', 'criterio_evaluacion'),
			'notaSeguimiento' => array(self::HAS_MANY, 'NotaSeguimientoUsuario', 'id_seguimiento_usuario_curso'),
		);
	}
        
        public function validarPorcenje($attribute,$params) 
        {
            $suma = SeguimientoUsuarioCurso::model()->findBySql('SELECT SUM(porcentaje) totalSuma FROM seguimiento_usuario_curso WHERE id_curso = ? AND criterio_evaluacion = ?', array($this->id_curso, $this->criterio_evaluacion));
            $suma->totalSuma = $suma->totalSuma != null ? $suma->totalSuma : 0;
            $por = SeguimientoUsuarioCurso::model()->findBySql('(SELECT porcentaje_criterio porcentaje_r FROM criterios_evaluativos WHERE id_criterio = ? LIMIT 1); ', array($this->criterio_evaluacion));
//            echo '<pre>';var_dump($this->isNewRecord);var_dump($por->porcentaje_r);var_dump($suma->totalSuma);die;
            if($this->isNewRecord){
                if(($suma->totalSuma + $this->porcentaje) > $por->porcentaje_r)
                $this->addError($attribute, "El porcentaje acomulado de momento es de ".$suma->totalSuma. " el cual sumado con ".$this->porcentaje." supera el porcentaje permitido por este criterio de evaluación.");
            }else{
                $modelOriginal = SeguimientoUsuarioCurso::model()->findByPk($this->id);
                if($modelOriginal->criterio_evaluacion == $this->criterio_evaluacion){
                  if(($suma->totalSuma - $modelOriginal->porcentaje + $this->porcentaje) > $por->porcentaje_r)
                    $this->addError($attribute, "El porcentaje acomulado de momento es de ".($suma->totalSuma - $modelOriginal->porcentaje)." el cual sumado con ".$this->porcentaje." supera el porcentaje permitido por este criterio de evaluación.");
                }else{
                    if(($suma->totalSuma + $this->porcentaje) > $por->porcentaje_r)
                    $this->addError($attribute, "El porcentaje acomulado de momento es de ".($suma->totalSuma)." el cual sumado con ".$this->porcentaje." supera el porcentaje permitido por este criterio de evaluación.");
                }
            }
        }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
                        'nombre_seguimiento' => 'Nombre',
			'id_curso' => 'Curso',
			'id_usuario' => 'Usuario',
			'id_tipo_nota' => 'Tipo Nota',
			'porcentaje' => 'Porcentaje',
			'descripcion' => 'Descripcion',
                        'estado_seguimiento' => 'Estado',
                        'criterio_evaluacion' => 'Criterio de evaluación'
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
		$criteria->compare('estado_seguimiento',$this->estado_seguimiento);

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
