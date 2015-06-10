<?php

class CodigoIngresoCursoController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
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
     * Este metodo se encarga de buscar un codigo aleatorio que no se encuentre en un curso.
     * @param int $id codigo del curso
     */
    public function actionGenerarCodigoCurso($id) {
       $cod = 0;
        do{
           $cod = mt_rand(1000,10000000) ;
           if(CodigoIngresoCurso::model()->find('id_curso = ? AND codigo_verficacion=?', array($_REQUEST['curso_id'],$cod))==NULL){
               break;
           }
       }while(true);
       echo json_encode(array('codigo'=>$cod));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->layout = '//layouts/modal';
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id) {
        $model = new CodigoIngresoCurso;
        $this->layout = "//layouts/modal";

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['CodigoIngresoCurso'])) {
            $model->attributes = $_POST['CodigoIngresoCurso'];
            $model->fecha_creacion = date('Y-m-d');
            if ($model->save())
                 Yii::app()->user->setFlash('success', "<strong>Exito!</strong>".Yii::t('polimsn', 'The code for this course this was stored successfully') );
        }

        $this->render('create', array(
            'model' => $model,
            'curso' => Cursos::model()->findByPk($id)
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $this->layout = "//layouts/modal";
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['CodigoIngresoCurso'])) {
            $model->attributes = $_POST['CodigoIngresoCurso'];
            if ($model->save())
                Yii::app()->user->setFlash('success', "<strong>Exito!</strong>".Yii::t('polimsn', 'The code was updated successfully') );
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
            $codigo = $this->loadModel($id);
            $codigo->estado = INACTIVE;
            $codigo->update();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }
    
    
    public function actionActive($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $codigo = $this->loadModel($id);
            $codigo->estado = ACTIVE;
            $codigo->update();

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
        $dataProvider = new CActiveDataProvider('CodigoIngresoCurso');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($id) {
        $this->layout = "//layouts/modal";
        $model = new CodigoIngresoCurso('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['CodigoIngresoCurso']))
            $model->attributes = $_GET['CodigoIngresoCurso'];

        $this->render('admin', array(
            'model' => $model,
            'curso' => Cursos::model()->findByPk($id)
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = CodigoIngresoCurso::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'codigo-ingreso-curso-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
