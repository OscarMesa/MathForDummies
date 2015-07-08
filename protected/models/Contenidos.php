<?php

/**
 * This is the model class for table "contenidos".
 *
 * The followings are the available columns in table 'contenidos':
 * @property integer $id
 * @property string $state_contenido
 * @property string $titulo
 * @property string $detalle
 * @property integer $id_usuario_creador
 * @property string $visible
 *
 * The followings are the available model relations:
 * @property DocumentosAdjuntos[] $documentosAdjuntoses
 * @property Talleres[] $talleres
 */
class Contenidos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contenidos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario_creador,titulo, detalle', 'required'),
			array('id_usuario_creador', 'numerical', 'integerOnly'=>true),
			array('state_contenido', 'length', 'max'=>8),
			array('titulo', 'length', 'max'=>45),
			array('visible', 'length', 'max'=>7),
			array('detalle', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, state_contenido, titulo, detalle, id_usuario_creador, visible', 'safe', 'on'=>'search'),
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
			'documentosAdjuntoses' => array(self::MANY_MANY, 'DocumentosAdjuntos', 'contenidos_documentos_adjuntos(id_contenido, id_document_adj)'),
			'talleres' => array(self::MANY_MANY, 'Talleres', 'contenidos_talleres(contenidos_id, talleres_idtalleres)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'state_contenido' => 'Estado',
			'titulo' => 'Titulo',
			'detalle' => 'Detalle',
			'id_usuario_creador' => 'Creador',
			'visible' => 'Visible',
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
		$criteria->compare('state_contenido',$this->state_contenido,true);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('id_usuario_creador',$this->id_usuario_creador);
		$criteria->compare('visible',$this->visible,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function searchForContenido()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;


                $criteria->compare('id',$this->id);
		$criteria->compare('state_contenido',$this->state_contenido,true);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->addCondition('(visible="privado" AND id_usuario_creador = "'.$this->id_usuario_creador.'")','OR');
                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                    'Pagination'=>array(
                        'pageSize' => 100,
                    )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contenidos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
