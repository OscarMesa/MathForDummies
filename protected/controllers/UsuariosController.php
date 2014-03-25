<?php

class UsuariosController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'inicio','createAnonimo'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'active', 'inactive', 'ajaxFiltroUsuarios'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionInicio() {
        //print_r(Yii::app()->user);exit();
        if (!Yii::app()->user->isGuest) {
            $this->render('application.views.site.inicio');
        } else {
            $this->redirect('site/login');
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
    
    
    public function actionCreateAnonimo()
    {
        $model = new Usuarios;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Usuarios'])) {
//             echo '<pre>';
//            
//            exit();
            $model->contrasena = sha1($_POST['Usuarios']['contrasena']);
            $model->passConfirm = sha1($_POST['Usuarios']['passConfirm']);
            if ($model->save()){
                $model->setUniversidad($_POST['Universidad']);
                $model->setPerfiles($_POST['Perfiles']);
                $this->redirect(array('view', 'id' => $model->id_usuario));
            }else{
                $model->contrasena = '';
                $model->passConfirm  = '';
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }        
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actioncreate() {
        $model = new Usuarios;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Usuarios'])) {
//             echo '<pre>';
//            print_r($_POST);exit();
            $model->attributes = $_POST['Usuarios'];
//            
//            exit();
            $model->contrasena = sha1($_POST['Usuarios']['contrasena']);
            $model->passConfirm = sha1($_POST['Usuarios']['passConfirm']);
            if ($model->save()){
                $model->setUniversidad($_POST['Universidad']);
                $model->setPerfiles($_POST['Perfiles']);
                $this->redirect(array('view', 'id' => $model->id_usuario));
            }else{
                $model->contrasena = '';
                $model->passConfirm  = '';
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
        $model = Usuarios::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuarios-form') {
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
                if($columna->id != 'perfil')
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
