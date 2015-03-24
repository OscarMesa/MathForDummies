<?php

/**
 * This is the model class for table "evaluacion".
 *
 * The followings are the available columns in table 'evaluacion':
 * @property integer $id_evaluacion
 * @property integer $cursos_id
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $porcentaje
 * @property string $tiempo_limite
 * @property integer $estado_evaluación
 * @property integer $tipo_evaluacion_id
 * @property integer $prefijo_horario_fini
 * @property integer $prefijo_horario_ffin
 *
 * The followings are the available model relations:
 * @property array $ejercicios
 * @property array $temas
 */
class Evaluacion extends CActiveRecord {

    const TP_EVL_VIRTUAL = 2;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'evaluacion';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cursos_id,porcentaje,tipo_evaluacion_id', 'required'),
            array('fecha_inicio', 'required', 'message' => 'El rango de fecha es requerido'),
            array('cursos_id, estado_evaluación', 'numerical', 'integerOnly' => true),
            array('porcentaje', 'length', 'max' => 10),
            array('fecha_inicio, fecha_fin, tiempo_limite,ejercicios,id_evaluacion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('cursos_id, fecha_inicio, fecha_fin, porcentaje, tiempo_limite, estado_evaluación', 'safe', 'on' => 'search'),
            array('ejercicios', 'ValidarExistenciaEjericicos'),
            array('temas', 'ValidarExistenciaTemas'),
            array('porcentaje', 'ValidarDecimalNumberPorcentaje'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'curso' => array(self::BELONGS_TO, 'Cursos', 'cursos_id'),
            'tipo' => array(self::BELONGS_TO, 'TipoEvaluacion', 'cursos_id'),
            'temas_evaluacion' => array(self::HAS_MANY, 'TemaEvaluaciones', 'evaluaciones_id'),
        );
    }
    
    public function ValidarDecimalNumberPorcentaje($attribute, $params){
        $regex = '/^[+\-]?(?:\d+(?:\.\d*)?|\.\d+)$/';
        if(!preg_match($regex, $this->porcentaje))
            $this->addError ($attribute, Yii::t('polimsn', 'The percentage must be an integer or decimal number. For example: 2, 2.3,68.9,80.'));
    }


    public function ValidarExistenciaEjericicos($attribute, $params) {
        if (count($this->ejercicios) <= 0 && $this->tipo_evaluacion_id == self::TP_EVL_VIRTUAL)
            $this->addError($attribute, Yii::t('polimsn', 'You must select at least one exercise for creating evaluation.'));
    }

    public function ValidarExistenciaTemas($attribute, $params) {
        if (count($this->temas) <= 0)
            $this->addError($attribute, Yii::t('polimsn', 'You must select at least one item for creating evaluation.'));
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_evaluacion' => 'Id Evaluación',
            'cursos_id' => 'Cursos',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'porcentaje' => 'Porcentaje',
            'tiempo_limite' => 'Tiempo Limite',
            'estado_evaluación' => 'Estado Evaluación',
            'tipo_evaluacion_id' => 'Tipo de evaluación',
            'ejercicios' => 'Ejericios',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_evaluacion', $this->id_evaluacion);
        $criteria->compare('cursos_id', $this->cursos_id);
        $criteria->compare('fecha_inicio', $this->fecha_inicio, true);
        $criteria->compare('fecha_fin', $this->fecha_fin, true);
        $criteria->compare('porcentaje', $this->porcentaje, true);
        $criteria->compare('tiempo_limite', $this->tiempo_limite, true);
        $criteria->compare('estado_evaluación', $this->estado_evaluación);
        $criteria->compare('tipo_evaluacion_id', $this->tipo_evaluacion_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Evaluacion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getEjercicios() {
        return $this->ejercicios;
    }

    public function getTemas() {
        return $this->temas;
    }

    public function setEjercicios($ejercicios) {
        $this->ejercicios = $ejercicios;
    }

    public function setTemas($temas) {
        $this->temas = $temas;
    }
    
    public function guardarTemas()
    {
        EjerciciosEvaluaciones::model()->deleteAll(array(
            'condition'=>'evaluaciones_id=?',
            'params'=>array($this->id_evaluacion)
            )
                );
                foreach ($this->ejercicios as $ejercicio) {
                    $n = new EjerciciosEvaluaciones();
                    $n->ejercicios_id_ejercicio = $ejercicio;
                    $n->evaluaciones_id = $this->id_evaluacion;
                    $n->save();
                }
    }
    
    public function guardarEjercicios()
    {
        
    }
}
