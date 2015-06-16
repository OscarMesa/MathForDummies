<?php

/**
 * This is the model class for table "respuestaejercicio".
 *
 * The followings are the available columns in table 'respuestaejercicio':
 * @property integer $idRespuestaEjercicio
 * @property integer $id_ejercicio
 * @property string $respuesta_ejercicio
 * @property integer $ordenposicion
 * @property string $es_verdadero
 * @property string $estado_respuesta
 *
 * The followings are the available model relations:
 * @property Ejercicios $idEjercicio
 */
class Respuestaejercicio extends CActiveRecord {
    
    public $guardo = false;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'respuestaejercicio';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_ejercicio, respuesta_ejercicio, ordenposicion', 'required'),
            array('id_ejercicio, ordenposicion, estado_respuesta', 'numerical', 'integerOnly' => true),
            array('es_verdadero', 'length', 'max' => 1),
            array('ordenposicion', 'validarOrdenExistente'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idRespuestaEjercicio, id_ejercicio, respuesta_ejercicio, ordenposicion, es_verdadero, estado_respuesta', 'safe', 'on' => 'search'),
        );
    }

    /**
     * Este metodo valida que este orden ya no se encuentre ocupado por otor ejercicio.
     * @param type $attribute
     * @param type $params
     */
    public function validarOrdenExistente($attribute, $params) {
        if (isset($this->id_ejercicio) && $this->idEjercicio != null) {
            if ($this->isNewRecord) {
                if ($this->model()->count('id_ejercicio = ? AND ordenposicion = ? AND estado_respuesta=?', array($this->id_ejercicio, $this->ordenposicion,ACTIVE)) > 0) {
                    $this->addError($attribute, Yii::t('polimsn', 'the number entered is already in use by another response to this exercise') . ".");
                }
            } else {
                if ($this->model()->count('id_ejercicio = ? AND idRespuestaEjercicio <> ? AND ordenposicion = ? AND estado_respuesta=?', array($this->id_ejercicio, $this->idRespuestaEjercicio, $this->ordenposicion,ACTIVE)) > 0) {
                    $this->addError($attribute, Yii::t('polimsn', 'the number entered is already in use by another response to this exercise') . ".");
                }
            }
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idEjercicio' => array(self::BELONGS_TO, 'Ejercicios', 'id_ejercicio'),
            'esetado' => array(self::BELONGS_TO, 'Estados', 'estado_respuesta'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idRespuestaEjercicio' => 'ID',
            'id_ejercicio' => 'Ejercicio',
            'respuesta_ejercicio' => 'Respuesta',
            'ordenposicion' => 'Orden',
            'es_verdadero' => 'Respuesta verdadera',
            'estado_respuesta' => 'Estado'
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

        $criteria->compare('idRespuestaEjercicio', $this->idRespuestaEjercicio);
        $criteria->compare('id_ejercicio', $this->id_ejercicio);
        $criteria->compare('respuesta_ejercicio', $this->respuesta_ejercicio, true);
        $criteria->compare('ordenposicion', $this->ordenposicion);
        $criteria->compare('es_verdadero', $this->es_verdadero, true);
        $criteria->compare('estado_respuesta', $this->estado_respuesta, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Respuestaejercicio the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
