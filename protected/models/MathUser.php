<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MathUser
 *
 * @author Oskar
 * @property MathAuthitem[] $items
 */
class MathUser extends CrugeStoredUser {

    public $nameperfil; 
    public $EReCaptcha;

    public function tableName() {
        return parent::tableName();
    }

    public function rules() {
        $rules = parent::rules();
        $rules[] = array('nameperfil', 'required', 'on' => 'createanonimo');
        $rules[] = array('password', 'required', 'on' => 'cambiopassword');
        $rules[] = array('email', 'validate_exists', 'on' => 'registerwcaptcha');
        $rules[] = array('email', 'required');
        $rules[] = array('username,email', 'validate_unique', 'on' => 'createanonimo');
        $rules[] = array('passConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Tu contraseña y la contraseña de confirmación deben coincidir', 'on' => array('createanonimo'));
        $rules[] = array('EReCaptcha',
            'application.extensions.recaptcha.EReCaptchaValidator',
            'privateKey' => '6LfyGPESAAAAABH6_bGhXXQ6vst0atD6wUn5rb_C ',
            'on' => 'registerwcaptcha');
        return $rules;
    }

    public function validate_exists($att, $params) {
        $model = self::model()->findByAttributes(array($att => $this[$att]));
        if ($model == null) {
            $this->addError($att, "El correo ingresado no existe.");
            return;
        }
    }

    public function validate_unique($att, $params) {
        if ($this->scenario == 'createanonimo') {
            $model = self::model()->findByAttributes(array($att => $this[$att]));
            if ($model != null) {
                $duptext = CrugeTranslator::t('logon', '\'{attribute}\' already in use', array('attribute' => $att));
                $this->addError($att, $duptext);
                return;
            }
        } else {
            parent::validate_unique($att, $params);
        }
    }

    /**
     * @return type
     */
    public function relations() {
        return parent::relations() + array('items' => array(self::MANY_MANY, 'MathAuthitem', 'math_authassignment(itemname, userid)'),
                                            'cursos'=>array(self::MANY_MANY, 'Cursos', 'integrantes_curso(cursos_id,id_integrante)')
            );
    }

    public function attributeLabels() {
        return parent::attributeLabels() + array(
            'nameperfil' => ucfirst(CrugeTranslator::t('Perfil')),
            'EReCaptcha' => ucfirst(CrugeTranslator::t('logon', 'Enter verification code:')),
        );
    }

    public function getPerfil() {
        $params = array();
        $criteria = new CDbCriteria();
        $criteria->with = array(
            'items' => array('alias' => 'itiem', 'condition' => 'itiem.type=2 AND name NOT IN ("invitados")')
        );
        if ($this->iduser != NULL && $this->iduser != '') {
            $criteria->addCondition('iduser=?');
            $params[] = $this->iduser;
        }
        $criteria->params = $params;
        return $this->find($criteria)->items;
    }

    public function setPerfiles($perfiles) {
        foreach ($perfiles as $key => $perfil) {
            $p = new MathAuthassignment();
            $p->userid = $this->iduser;
            $p->bizrule = null;
            $p->data = "N;";
            $p->itemname = strtolower($perfil);
            if (!$p->save()) {
                if (YII_DEBUG) {
                    print_r($p->errors);
                    die;
                }
            }
        }
    }

    public function getNameperfil() {
        return $this->nameperfil;
    }

    public function setNameperfil($nameperfil) {
        $this->nameperfil = $nameperfil;
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        if (parent::beforeSave()) {
            if($this->scenario == 'createanonimo'){
                $method = Yii::app()->modules['cruge']['hash'];
                $this->password = $method($this->password); // if you save dates as INT
            }
            return true;
        }
        return false;
    }
    
    /**
     * Entraga dataProvider de los estudiantes incritos en un curso.
     * @param type $curso
     */
    public function participantesCurso($curso)
    {
        $criteriCurso = new CDbCriteria();
        $criteriCurso->compare('id', $curso);
        $criteria=new CDbCriteria();

	$criteria->with = array('cursos'=>$criteriCurso);
        
        
        
        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
        ));
    }

}
