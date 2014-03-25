<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id_usuario
 * @property string $state_usuario
 * @property string $nombre
 * @property string $apellido1
 * @property string $apellido2
 * @property string $contrasena
 * @property integer $telefono
 * @property string $celular
 * @property string $correo
 *
 * The followings are the available model relations:
 * @property Universidad[] $universidads
 * @property Perfiles[] $perfiles
 */
class Usuarios extends CActiveRecord {
    
    public $passConfirm;
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'usuarios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('contrasena,passConfirm,nombre,correo','required','except'=>array('create'),),
            array('contrasena,passConfirm','required','except'=>array('CreateAnonimo'),),
            array('contrasena,passConfirm','required','except'=>array('create'),),
            array('contrasena', 'compare', 'compareAttribute' => 'passConfirm', 'message' => 'Tu contraseña y la contraseña de confirmación deben coincidir', 'except'=>array('create')),
            array('nombre, apellido1, telefono, celular, correo','required', 'message'=>'Este campo es requerido.'),
            array('telefono', 'numerical', 'integerOnly' => true),
            array('state_usuario', 'length', 'max' => 8),
            array('nombre, apellido1, apellido2', 'length', 'max' => 30),
            array('contrasena', 'length', 'max' => 40),
            array('celular', 'length', 'max' => 20),
            array('correo', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_usuario, state_usuario, nombre, apellido1, apellido2, contrasena, telefono, celular, correo', 'safe', 'on' => 'search'),
           
           
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'universidads' => array(self::MANY_MANY, 'Universidad', 'usuario_universidades(id_usuario, universidades_id)'),
            'perfiles' => array(self::MANY_MANY, 'Perfiles', 'usuarios_perfiles(usuarios_id_usuario, perfiles_id_perfil)'),
            'usuariosUniversidades' => array(self::HAS_MANY, 'UsuarioUniversidades', 'id_usuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_usuario' => 'Id Usuario',
            'state_usuario' => 'Estado Usuario',
            'nombre' => 'Nombre',
            'apellido1' => 'Apellido1',
            'apellido2' => 'Apellido2',
            'contrasena' => 'Contraseña',
            'passConfirm' => 'Confirmar contraseña',
            'telefono' => 'Teléfono',
            'celular' => 'Celular',
            'correo' => 'Correo',
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
        
        $criteria->compare('id_usuario', $this->id_usuario);
        $criteria->compare('state_usuario', $this->state_usuario, true);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('apellido1', $this->apellido1, true);
        $criteria->compare('apellido2', $this->apellido2, true);
        $criteria->compare('contrasena', $this->contrasena, true);
        $criteria->compare('telefono', $this->telefono);
        $criteria->compare('celular', $this->celular, true);
        $criteria->compare('correo', $this->correo, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Usuarios the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getUniversidad() {
        $ids = array();
        foreach ($this->universidads as $c) {
            $ids[] = $c->id_universidad;
        }
        return $ids;
    }
    
    public function setUniversidad($universidades) 
    {
        UsuarioUniversidades::model()->deleteAll('id_usuario=? AND state_uu="activate"',array($this->id_usuario));
        foreach ($universidades as $key => $value) {
            if($value == '')continue;
            $universidad = new UsuarioUniversidades();
            $universidad->id_usuario = $this->id_usuario;
            $universidad->universidades_id = $value;
            if(!$universidad->save())
            {
                print_r($universidad->errors);
                exit();
            }
        }
    }

    
    public function getPerfiles() {
        $ids = array();
        foreach ($this->perfiles as $c) {
            $ids[] = $c->id_perfil;
        }
        return $ids;
    }
    
    public function setPerfiles($perfiles) 
    {
        UsuariosPerfiles::model()->deleteAll('usuarios_id_usuario=? AND state_up="activate"',array($this->id_usuario));
        foreach ($perfiles as $key => $value) {
            if($value == '')continue;
            $perfil = new UsuariosPerfiles();
            $perfil->usuarios_id_usuario = $this->id_usuario;
            $perfil->perfiles_id_perfil = $value;
            if(!$perfil->save())
            {
                print_r($perfil->errors);
                exit();
            }
        }
    }
    
}
