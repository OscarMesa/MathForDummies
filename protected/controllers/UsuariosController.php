<?php

class UsuariosController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
        );
    }
    
    /**
     * @return array action filters
     */
    public function filters() {
        //return array('accessControl',array('CrugeAccessControlFilter'));
    }
    
    /**
     * Este metodo obtiene los usuarios que son tipo estudiante.
     * @author Oskar <oscarmesa.elpoli@gmail.com>
     */
    public function actionObtenerEstudiantesAjax()
    {
        $serch = $_REQUEST['term'];
        $campos = CrugeField::model()->findAll(array(
            'alias' => 'campos',
            'condition' => "campos.idfield IN (1)",
            'with' => array(
                        'values' => array(
                            'alias' => 'valores',
                            'together' => true,
                            'condition' => 'iduser NOT IN (SELECT inte.id_integrante FROM integrantes_curso inte WHERE cursos_id = ?) AND lower(value) LIKE ? COLLATE utf8_general_ci',
                            'params' => array($_REQUEST['curso'],'%'.$serch.'%')
                        )
                      ),
        ));
        $array_return  = array();
        foreach ($campos as $valor) {
                foreach ($valor->values as $v) {
                    $array_return[] = array('id'=>$v->iduser, 'text'=> $v->value);
                }
        }
        echo json_encode($array_return);
    }
    
    public function actionInicio() {
        //print_r(Yii::app()->user);exit();
        if (!Yii::app()->user->isGuest) {
            // $this->render('application.views.site.inicio');

            $this->redirect(Yii::app()->getBaseUrl(true) . '/cursos/curso');
        } else {
            $this->redirect(Yii::app()->getBaseUrl(true).'/site/login');
        }
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionActivarDocente() {
        if (isset(Yii::app()->user->idUsuario) && Yii::app()->user->esAdmin()) {
//            print_r($_GET);
//            exit();

            if (isset($_GET['hash']) && isset($_GET['id']) && sha1('PoliAuLinkServer') == $_GET['hash']) {
                $usuario = Usuarios::model()->findByPk($_GET['id'], 'state_usuario="not_confirmed_admin"');
                if (count($usuario) > 0) {
                    $usuario->state_usuario = 'active';
                    $usuario->update();
                    $this->EnviarMailNuevoDocente($usuario);
                    $user = Yii::app()->getComponent('user');
                    $user->setFlash(
                            'success', "<strong>Exito!</strong> La activación ha sido exitosa. Se le ha enviado un correo de confirmación a este usuario."
                    );
                    $this->redirect(array(Yii::app()->defaultController));
                } else {
                    $user = Yii::app()->getComponent('user');
                    $user->setFlash(
                            'warning', "<strong>Atención!</strong> Posiblemente este usuario ya fue activado por el administrador. De lo contrario es posible que no exista."
                    );
                    $this->render('application.views.site.error');
                }
            } else {
                $user = Yii::app()->getComponent('user');
                $user->setFlash(
                            'error', "<strong>Error!</strong> Usted no se encuentra autorizado para realizar esta acción."
                );
                $this->render('application.views.site.error');
            }
        } else {
            $user = Yii::app()->getComponent('user');
            $user->setFlash(
                    'error', "<strong>Error!</strong> Para realizar esta acción debe iniciar sesión como administrador."
            );
            $this->redirect(array('site/login'));
        }
    }

    public function actionCambioPassword() {
        if (isset($_GET['hash']) && isset($_GET['id']) && sha1('PoliAuLinkServer') == $_GET['hash']) {
            $usuario = MathUser::model()->find("iduser = ? AND state=?",array($_GET['id'],CRUGEUSERSTATE_RECOVERPASSWORD));
            if (count($usuario) > 0) {
                $usuario->scenario = 'cambiopassword';
                $usuario->password = "";
                $this->render("nuevoPassword", array('model' => $usuario));
            } else {
                $user = Yii::app()->getComponent('user');
                Yii::app()->user->setFlash(
                        'error', "<strong>Error!</strong> Este usuario no tiene solicitudes para cambio de contraseña o posiblemente no exista."
                );
                $this->render('application.views.site.error');
            }
        } else {
            $user = Yii::app()->getComponent('user');
            $user->setFlash(
                    'error', "<strong>Error!</strong> Usted no se encuentra autorizado para realizar esta acción."
            );
            $this->render('application.views.site.error');
        }
    }

    public function actionGuardarCambioNuevoPassword() {
        $model = new MathUser('cambiopassword');
        if (isset($_POST['MathUser'])) {
            $model->attributes = $_POST['MathUser'];
            $this->performAjaxValidation($model);
            $model = $this->loadModel($_POST['MathUser']['iduser']);
            $model->password = sha1($_POST['MathUser']['password']);
            $model->state = CRUGEUSERSTATE_ACTIVATED;
            if ($model->update()) {
                $user = Yii::app()->getComponent('user');
                $user->setFlash(
                        'success', "<strong>Exito!</strong> El cambio se realizo exitosamente."
                );
                $this->redirect(Yii::app()->getBaseUrl(true));
            }else{
                if(YII_DEBUG){
                    print_r($model->errors);die;
                }
            }
        }
        $this->render('nuevoPassword', array('model' => $model));
    }

    public function actionRecuperarPassword() {
        $usuario = new MathUser('registerwcaptcha');

        if (isset($_POST['MathUser'])) {
            $usuario->attributes = $_POST['MathUser'];
          //  print_r($_POST);die;
            $this->performAjaxValidation($usuario);
            //print_r($_POST);
            $u = $usuario->find('email=?', array($usuario->email));

            $this->enviarMailRecuperacionUsuario($u);
            $u->state = CRUGEUSERSTATE_RECOVERPASSWORD;
            $u->update();
            $user = Yii::app()->getComponent('user');
            Yii::app()->user->setFlash(
                        'success', "<strong>Exito!</strong> Se ha enviado un correo con la informacón para realizar este cambío."
                );
            $this->redirect(Yii::app()->getBaseUrl(true));
        }
    }

    public function actionActivarusuario() {
        if (isset($_GET['hash']) && isset($_GET['id']) && sha1('PoliAuLinkServer') == $_GET['hash']) {
            $usuario = MathUser::model()->findByPk($_GET['id'], 'state=?',array(CRUGEUSERSTATE_NOTCONFIRMATE));
            if (count($usuario) > 0) {
//                $perfil = $usuario->getRandomPerfil();
                $esDocente = FALSE;
//                if ($perfil->id_perfil == 4) {
//                    $esDocente = TRUE;
//                    $usuario->state_usuario = 'not_confirmed_admin';
//                    $mensaje = '<strong>Confirmación exitoso!</strong> Su cuenta a sido confimada exitosamente, aunque queda a la espera de que el administrador confirme su cuenta.';
//                } else {
                    $mensaje = "<strong>Confirmación exitoso!</strong> Su cuenta a sido confimada exitosamente.";
                    $usuario->state = CRUGEUSERSTATE_ACTIVATED;
//                }
                $usuario->update();
                $user = Yii::app()->getComponent('user');
                $user->setFlash(
                        'success', $mensaje
                );
               // $this->EnviarMailAdministradores($usuario, $esDocente);
                $this->redirect(array('site/login'));
            } else {
                $user = Yii::app()->getComponent('user');
                $user->setFlash(
                        'warning', "<strong>Atención!</strong> Posiblemente este usuario ya fue activado o realmente no exite en la aplicación."
                );
                $this->render('application.views.site.error');
            }
        } else {
            $user = Yii::app()->getComponent('user');
            $user->setFlash(
                    'error', "<strong>Error!</strong> Usted no se encuentra autorizado para realizar esta acción."
            );
            $this->render('application.views.site.error');
        }
    }

    public function actionCreateAnonimo() {
        $model = new MathUser();
        // Uncomment the following line if AJAX validation is needed
        if (isset($_POST['MathAuthitem'])) {
            $model->scenario = 'createanonimo';
//
//            $model->password = $_POST['Usuarios']['contrasena'];
//            $model->passConfirm = $_POST['Usuarios']['passConfirm'];

            $model->attributes = $_POST['MathUser'];
  
            $this->performAjaxValidation($model);

            $model->state = CRUGEUSERSTATE_NOTCONFIRMATE;          
            if ($model->save()) {
                $model->setPerfiles(array($_POST['MathAuthitem']['name']));
                $this->EnviarMailNuevoUsuario($model);
                $user = Yii::app()->getComponent('user');
                $user->setFlash(
                        'success', "<strong>Rregistro exitoso!</strong> El usuario ha sido registrado con éxito, se ha enviado un correo para realizar la activación de la cuenta."
                );
                $this->redirect(array('site/login'));
            } else {
                $model->passConfirm = '';
                $model->password = '';
            }
        }
        print_r($model->errors);
    }

    /**
     * 
     * @param Usuarios $usuario
     */
    public function enviarMailRecuperacionUsuario($usuario) {
        Yii::import('ext.yii-mail.YiiMailMessage');
        $message = new YiiMailMessage;
        //this points to the file test.php inside the view path
        $message->view = "recuperacionPassword";
        $sid = 1;
        $params = array('usuario' => $usuario);
        $message->subject = 'Recuperar contraseña';
        $message->setBody($params, 'text/html');
        $message->addTo($usuario->email);
        $message->from = 'admin@poliAuLink.edu.co';
        Yii::app()->mail->send($message);
    }

    /**
     * 
     * @param Usuarios $usuario
     */
    public function EnviarMailNuevoDocente($usuario) {
        Yii::import('ext.yii-mail.YiiMailMessage');
        $message = new YiiMailMessage;
        //this points to the file test.php inside the view path
        $message->view = "confirmarDocente";
        $sid = 1;
        $params = array('usuario' => $usuario);
        $message->subject = 'Activacón exitosa por administrador';
        $message->setBody($params, 'text/html');
        $message->addTo($usuario->correo);
        $message->from = 'admin@poliAuLink.edu.co';
        Yii::app()->mail->send($message);
    }

    /**
     * 
     * @param ICrugeAuth $usuario
     */
    public function EnviarMailNuevoUsuario($usuario) {
        Yii::import('ext.yii-mail.YiiMailMessage');
        $message = new YiiMailMessage;
        //this points to the file test.php inside the view path
        $message->view = "nuevoUsuario";
        $sid = 1;
        $params = array('usuario' => $usuario,);
        $message->subject = 'Registro exitoso';
        $message->setBody($params, 'text/html');
        $message->addTo($usuario->email);
        $message->from = 'admin@poliAuLink.edu.co';
        Yii::app()->mail->send($message);
    }

    /**
     * 
     * @param Usuarios $usuario
     */
    public function EnviarMailAdministradores($usuario, $esDocente) {
        $administradores = Usuarios::model()->with(array('perfiles' => array('alias' => 'p')))->findAll('p.id_perfil=?', array(6));
        Yii::import('ext.yii-mail.YiiMailMessage');
        foreach ($administradores as $admin) {
            $message = new YiiMailMessage;
            //this points to the file test.php inside the view path
            $message->view = "nuevoUsuarioAdmin";
            $sid = 1;
            $params = array('usuario' => $usuario, 'admin' => $admin, 'esDocente' => $esDocente);
            $message->subject = 'Nuevo usuario registrado.';
            $message->setBody($params, 'text/html');
            $message->addTo($admin->correo);
            $message->from = 'admin@poliAuLink.edu.co';
            Yii::app()->mail->send($message);
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actioncreate() {
        $model = new Usuarios;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Usuarios'])) {
//             echo '<pre>';
//            print_r($_POST);exit();
            $model->attributes = $_POST['Usuarios'];
//            
//            exit();
            $model->contrasena = sha1($_POST['Usuarios']['contrasena']);
            $model->passConfirm = sha1($_POST['Usuarios']['passConfirm']);
            if ($model->save()) {
                $model->setUniversidad($_POST['Universidad']);
                $model->setPerfiles($_POST['Perfiles']);
                $this->redirect(array('view', 'id' => $model->id_usuario));
            } else {
                $model->contrasena = '';
                $model->passConfirm = '';
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Usuarios'])) {
            $model->attributes = $_POST['Usuarios'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_usuario));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Usuarios');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Usuarios('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Usuarios']))
            $model->attributes = $_GET['Usuarios'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = MathUser::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && ($_POST['ajax'] === 'usuarios-form' || $_POST['ajax'] === 'usuarios-form-recuperar')) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionActive($id) {
        Usuarios::model()->updateByPk($id, array('state_usuario' => 'active'));
        $this->render('application.views.site.inicio');
    }

    public function actionInactive($id) {
        Usuarios::model()->updateByPk($id, array('state_usuario' => 'inactive'));
        $this->render('application.views.site.inicio');
    }
    
    

    /**
     * Este metodo se encarga de enviar el grid por ajax, filtrando por cualquier campo
     * @author Oskar <oscarmesa.elpoli@gmail.com>
     * 
     */
    public function actionAjaxFiltroUsuarios() {
        $columnas = json_decode($_POST['columnas']);
        $criteria = new CDbCriteria();
        $criteria->alias = 'usuario';
        // $criteria->join = ' INNER JOIN perfiles perfil'
        $criteria->join = ' INNER JOIN usuarios_perfiles up ON up.usuarios_id_usuario= usuario.id_usuario';
        $criteria->join .= ' INNER JOIN perfiles perfil ON perfil.id_perfil= up.perfiles_id_perfil';
        $params = array();
        if (count($columnas) > 0) {
            foreach ($columnas as $columna) {
                if ($columna->id != 'perfil')
                    $criteria->addCondition('usuario.' . $columna->id . '=?', 'OR');
                else
                    $criteria->addCondition('perfil.nombre=?', 'OR');
                $params[] = $_POST['data'];
            }
        } else {
            $criteria->addCondition('usuario.nombre=?', 'OR');
            $criteria->addCondition('usuario.apellido1=?', 'OR');
            $criteria->addCondition('usuario.apellido2=?', 'OR');
            $criteria->addCondition('usuario.telefono=?', 'OR');
            $criteria->addCondition('usuario.celular=?', 'OR');
            $criteria->addCondition('usuario.correo=?', 'OR');
            $criteria->addCondition('perfil.nombre=?', 'OR');
            for ($i = 0; $i < 7; $i++) {
                $params[] = $_POST['data'];
            }
        }
        $criteria->group = 'usuario.id_usuario';
        $criteria->select = 'usuario.*,perfil.nombre nombre_perfil';
        $criteria->params = $params;
        $dataProvider = new CActiveDataProvider('Usuarios', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 20,
            )
                )
        );
        echo $this->renderPartial('_gridUsuarios', array('dataProvider' => $dataProvider), true);
    }

}
