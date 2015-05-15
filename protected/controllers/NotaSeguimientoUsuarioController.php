<?php

class NotaSeguimientoUsuarioController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
         return array('accessControl', array('CrugeAccessControlFilter'));
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
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $this->layout = '//layouts/modal';
        $model = new NotaSeguimientoUsuario();
        $model->idSeguimientoUsuarioCurso = SeguimientoUsuarioCurso::model()->findByPk($_REQUEST['seguimiento']);
        $model->idUsuario = MathUser::model()->findByPk($_REQUEST['estudiante']);
        
        $model->id_usuario = $_REQUEST['estudiante'];
        $model->id_seguimiento_usuario_curso = $_REQUEST['seguimiento'];
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['NotaSeguimientoUsuario'])) {
            $model->attributes = $_POST['NotaSeguimientoUsuario'];
            if ($model->save())
            {
                $m = Yii::t('polimsn', 'Note tracking updated successfully.');
                $user = Yii::app()->getComponent('user')->setFlash(
                        'success', $m
                );
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
        $this->layout = '//layouts/modal';
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['NotaSeguimientoUsuario'])) {
            $model->attributes = $_POST['NotaSeguimientoUsuario'];
            if ($model->save())
            {
                $m = Yii::t('polimsn', 'Note tracking updated successfully.');
                $user = Yii::app()->getComponent('user')->setFlash(
                        'success', $m
                );
            }
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
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('NotaSeguimientoUsuario');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new NotaSeguimientoUsuario('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['NotaSeguimientoUsuario']))
            $model->attributes = $_GET['NotaSeguimientoUsuario'];

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
        $model = NotaSeguimientoUsuario::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'nota-seguimiento-usuario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
