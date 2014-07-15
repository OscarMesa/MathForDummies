<?php

/**
 * This is the model class for table "img_videos_sonido_contenidos".
 *
 * The followings are the available columns in table 'img_videos_sonido_contenidos':
 * @property integer $img_videos_id
 * @property integer $contenidos_id
 * @property string $state_video_has_contenidos
 * @property integer $contenidos_tipo_contenido_id
 */
class ImgVideosSonidoContenidos extends CActiveRecord
{
    
        /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'img_videos_sonido_contenidos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('img_videos_id, contenidos_id', 'required'),
			array('img_videos_id, contenidos_id, contenidos_tipo_contenido_id', 'numerical', 'integerOnly'=>true),
			array('state_video_has_contenidos', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('img_videos_id, contenidos_id, state_video_has_contenidos, contenidos_tipo_contenido_id', 'safe', 'on'=>'search'),
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
                    
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'img_videos_id' => 'Img Videos',
			'contenidos_id' => 'Contenidos',
			'state_video_has_contenidos' => 'State Video Has Contenidos',
			'contenidos_tipo_contenido_id' => 'Contenidos Tipo Contenido',
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

		$criteria->compare('img_videos_id',$this->img_videos_id);
		$criteria->compare('contenidos_id',$this->contenidos_id);
		$criteria->compare('state_video_has_contenidos',$this->state_video_has_contenidos,true);
		$criteria->compare('contenidos_tipo_contenido_id',$this->contenidos_tipo_contenido_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ImgVideosSonidoContenidos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
