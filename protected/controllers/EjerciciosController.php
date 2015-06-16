<?php

class EjerciciosController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array('accessControl', array('CrugeAccessControlFilter'));;
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
        $this->layout = "modal";
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Ejercicios;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Ejercicios'])) {
            $model->attributes = $_POST['Ejercicios'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_ejercicio));
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
        $Mcontenidos = Contenidos::model() ;
        $Mcontenidos->id_usuario_creador =  Yii::app()->user->id;
        
        if (isset($_POST['Ejercicios'])) {
            $model->attributes = $_POST['Ejercicios'];
            $transaction=$model->dbConnection->beginTransaction();
            try{
                $model->save();
                $model->guardarContenidos();
                $transaction->commit();
                $user = Yii::app()->getComponent('user');
                $user->setFlash(
                        'success',Yii::t('polimsn', "<strong>Success!</strong> The exercise was successfully updated")."."
                );
            }  catch (Exception $e){
                print_r($e);die;
                $transaction->rollback();
                }
        }else{
            $model->contenidos = array();
            $model->contenidos['check'] = CHtml::listData($model->contenidos_ejercicios, 'contenidos_id', 'contenidos_id');
            $model->contenidos['orden'] = CHtml::listData($model->contenidos_ejercicios, 'contenidos_id', 'orden');
        }
            $this->render('update', array(
                'model' => $model,
                'Mcontenidos' => $Mcontenidos,
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
        $dataProvider = new CActiveDataProvider('Ejercicios');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Ejercicios('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Ejercicios']))
            $model->attributes = $_GET['Ejercicios'];

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
        $model = Ejercicios::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ejercicios-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
