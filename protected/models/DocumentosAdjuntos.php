<?php

/**
 * This is the model class for table "documentos_adjuntos".
 *
 * The followings are the available columns in table 'documentos_adjuntos':
 * @property integer $id_doc_adj
 * @property integer $id_usuario_doc_adj
 * @property string $nom_original_doc_adj
 * @property string $registro_doc_adj
 * @property string $extension_doc_adj
 * @property string $tamanio_doc_adj
 * @property integer $state_doc_adj
 *
 * The followings are the available model relations:
 * @property Contenidos[] $contenidoses
 */
class DocumentosAdjuntos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'documentos_adjuntos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario_doc_adj, nom_original_doc_adj, registro_doc_adj, extension_doc_adj, tamanio_doc_adj', 'required'),
			array('id_usuario_doc_adj, state_doc_adj', 'numerical', 'integerOnly'=>true),
			array('extension_doc_adj', 'length', 'max'=>20),
			array('tamanio_doc_adj', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_doc_adj, id_usuario_doc_adj, nom_original_doc_adj, registro_doc_adj, extension_doc_adj, tamanio_doc_adj, state_doc_adj', 'safe', 'on'=>'search'),
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
			'contenidoses' => array(self::MANY_MANY, 'Contenidos', 'contenidos_documentos_adjuntos(id_document_adj, id_contenido)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_doc_adj' => 'Id Doc Adj',
			'id_usuario_doc_adj' => 'Id Usuario Doc Adj',
			'nom_original_doc_adj' => 'Nom Original Doc Adj',
			'registro_doc_adj' => 'Registro Doc Adj',
			'extension_doc_adj' => 'Extension Doc Adj',
			'tamanio_doc_adj' => 'Tamanio Doc Adj',
			'state_doc_adj' => 'State Doc Adj',
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

		$criteria->compare('id_doc_adj',$this->id_doc_adj);
		$criteria->compare('id_usuario_doc_adj',$this->id_usuario_doc_adj);
		$criteria->compare('nom_original_doc_adj',$this->nom_original_doc_adj,true);
		$criteria->compare('registro_doc_adj',$this->registro_doc_adj,true);
		$criteria->compare('extension_doc_adj',$this->extension_doc_adj,true);
		$criteria->compare('tamanio_doc_adj',$this->tamanio_doc_adj,true);
		$criteria->compare('state_doc_adj',$this->state_doc_adj);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function buscar_adjuntos($usuario=false, $state=0)
	{
		$criteria = new CDbCriteria();
		$criteria->select = 'id_doc_adj';
		$criteria->condition = 'state_doc_adj=:state AND id_usuario_doc_adj=:usuario';
		$criteria->params = array(':state'=>$state, ':usuario'=>$usuario);
		$model = $this->findAll($criteria);
		return $model;
	}

	public function actualiza_adjunto($id = false)
	{
		$adj = $this->findByPk($id);
		$adj->state_doc_adj=1;
		$adj->update();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DocumentosAdjuntos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
