<?php

/**
 * This is the model class for table "img_videos_sonido".
 *
 * The followings are the available columns in table 'img_videos_sonido':
 * @property integer $id
 * @property string $state_img_videos
 * @property string $url
 * @property string $nombre
 * @property string $type
 * @property string $descripcion
 * @property integer $idUsiario
 * @property string $name_img
 */
class ImgVideosSonido extends CActiveRecord {
    
     /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'img_videos_sonido';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre, descripcion, type, state_img_videos', 'required'),
            array('url', 'validatVimeo', 'on' => 'video',),
            array('url', 'required', 'on' => 'video',),
            array('name_img', 'validateImg', 'on' => 'img',),
            array('idUsiario', 'numerical', 'integerOnly' => true),
            array('state_img_videos', 'length', 'max' => 8),
            array('url', 'length', 'max' => 100),
            array('type', 'length', 'max' => 6),
            array('nombre, descripcion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, state_img_videos, url, nombre, type, descripcion, idUsiario', 'safe', 'on' => 'search'),
        );
    }

    public function validatVimeo($attribute,$params) {
        if (!(strpos(strtolower($this->url), 'vimeo.com/') !== false)) {
           $this->addError($attribute, 'La url del video debe ser de vimeo.');
        }
    }
    
    public function validateImg($attribute,$params)
    {
        if($this->name_img == "")
            $this->addError('url', 'El componente multimedia es necesario.');
        else if(!preg_match('(([^"]+)(.)(jpeg|png|jpg))',$this->name_img))
                $this->addError('url', 'El componente multimedia solo permite imagenes en formatos jpeg, png o jpg.');
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'contenidos' => array(self::MANY_MANY, 'Contenidos', 'img_videos_sonido_contenidos(img_videos_id,contenidos_id)',),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'state_img_videos' => 'Estado',
            'url' => 'Componente Multimedia',
            'nombre' => 'Nombre',
            'type' => 'Tipo',
            'descripcion' => 'Descripción',
            'idUsiario' => 'Usuario',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('state_img_videos', $this->state_img_videos, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('idUsiario', $this->idUsiario);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchByContenido($id_contenido) {
        $criteria = new CDbCriteria();
        $criteria->join = ' INNER JOIN img_videos_sonido_contenidos ivc ON (ivc.img_videos_id=t.id)';
        $criteria->condition = 'ivc.contenidos_id=?';
        $criteria->params = array($id_contenido);
//              $criteria->params = array($id_contenido);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ImgVideosSonido the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function getName_img() {
        return $this->name_img;
    }

    public function setName_img($name_img) {
        $this->name_img = $name_img;
    }

}
