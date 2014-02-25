<?php

/**
 * This is the model class for table "usuarios_perfiles".
 *
 * The followings are the available columns in table 'usuarios_perfiles':
 * @property integer $usuarios_id_usuario
 * @property string $state_up
 * @property integer $perfiles_id_perfil
 */
class UsuariosPerfiles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios_perfiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuarios_id_usuario, perfiles_id_perfil', 'required'),
			array('usuarios_id_usuario, perfiles_id_perfil', 'numerical', 'integerOnly'=>true),
			array('state_up', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usuarios_id_usuario, state_up, perfiles_id_perfil', 'safe', 'on'=>'search'),
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
                    'usuarios' => array(self::BELONGS_TO, 'Usuarios', 'usuarios_id_usuario'),
                    'perfiles' => array(self::BELONGS_TO, 'Perfiles', 'perfiles_id_perfil'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuarios_id_usuario' => 'Usuarios Id Usuario',
			'state_up' => 'State Up',
			'perfiles_id_perfil' => 'Perfiles Id Perfil',
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

		$criteria->compare('usuarios_id_usuario',$this->usuarios_id_usuario);
		$criteria->compare('state_up',$this->state_up,true);
		$criteria->compare('perfiles_id_perfil',$this->perfiles_id_perfil);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuariosPerfiles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
