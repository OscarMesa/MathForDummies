<?php

class SiteController extends Controller {
    
    public $layout = "//layouts/column2";
    
    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }
    
    public function filters() {
        return array('accessControl',array('CrugeAccessControlFilter'));
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array();
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {

        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail('poliaulink@gmail.com',  $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', Yii::t('polimsn', 'Thank you for contacting us. We will respond to you as soon as possible.'));
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        Yii::import('application.modules.cruge.controllers.UiController');
        $model = new LoginForm;
        if (!Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->baseUrl . '/' . Yii::app()->defaultController);
        }
        $cruger = new UiController(-1);
        $r = $model = $cruger->actionLogin();
        
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }   

        // collect user input data
       
        if ($r === true){
             $this->redirect(Yii::app()->baseUrl . '/' . Yii::app()->defaultController);
            /*$model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid

            $user = Yii::app()->getComponent('user');
            $usuario = Usuarios::model()->find('correo=?', array($model->username));
            // exit();
            if ($usuario != null) {
                if ($usuario->state_usuario == 'inactive') {
                    $user->setFlash('error', "<strong>Error!</strong> Lo sentimos este usuario esta inactivo.");
                } else if ($usuario->state_usuario == 'not_confirmed') {
                    $user->setFlash('warning', "<strong>Atención!</strong> Debe confirmar su cuenta.");
                } else if ($usuario->state_usuario == 'not_confirmed_admin') {
                    $user->setFlash('warning', "<strong>Atención!</strong> Esta cuenta debe ser confirmada por el administrador.");
                } else if ($usuario->state_usuario == 'recover_password') {
                    $user->setFlash('warning', "<strong>Atención!</strong> Esta cuenta tiene una solicitud para restaurar la contraseña, debe restaurarce para iniciar.");
                } else if ($model->validate() && $model->login()) {
                    $this->redirect(Yii::app()->baseUrl . '/' . Yii::app()->defaultController);
                }
            } */
        }//','',''
        
        if(isset($model->getModel()->state) && $model->getModel()->state == CRUGEUSERSTATE_NOTCONFIRMATE)
        {
            $model->addError('username', Yii::t('polimsn', "this user has not yet confirmed your account"));
        }else if(isset($model->getModel()->state) && $model->getModel()->state == CRUGEUSERSTATE_RECOVERPASSWORD){
            $model->addError('username', Yii::t('polimsn', "this user has requested password change"));
        }
        
        $this->render('application.views.usuarios.login', array(
            'model' => $model,
        ));
    }

    public function actionAjaxInicioSesion() {
        $model = new LoginForm;
        $this->renderPartial('application.views.usuarios._formInicio', array(
            'model' => $model,
            'perfiles' => Perfiles::model()->findAll()
        ));
        exit();
    }

    public function actionAjaxRegistro() {
        $this->renderPartial('application.views.usuarios._formRegistro', array(
            'modelRegistro' => new Usuarios()
        ));
        exit();
    }

    public function actionAjaxRecuperar() {
        $model = new LoginForm;
        $this->renderPartial('application.views.usuarios._formRecuperar', array(
            'model' => $model,
            'perfiles' => Perfiles::model()->findAll()
        ));
        exit();
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}