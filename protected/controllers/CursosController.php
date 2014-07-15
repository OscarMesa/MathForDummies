<?php

class CursosController extends Controller {

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
//        return array(
//            'accessControl', // perform access control for CRUD operations
//        );
    }

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
        $model = new Cursos;
        if (isset($_POST['Cursos'])) {
            $model->attributes = $_POST['Cursos'];
            $fecha = explode(' - ', $_POST['Cursos']['fecha_inicio']);
             if (count($fecha) == 2) {
                $model->fecha_inicio = $fecha[0];
                $model->fecha_cierre = $fecha[1];
                             // exit();
                $model->id_docente = Yii::app()->user->getId();
            }  else {
                $model->fecha_inicio = '';
                $model->fecha_cierre = '';
            }
            if ($model->save()){
             $user = Yii::app()->getComponent('user');
                $user->setFlash(
                            'success', "<strong>Exito!</strong> Se el curso fue creado exitosamente."
                );
                $this->redirect(Yii::app()->getBaseUrl(true).'/cursos/update/'.$model->id);
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionCurso() {
        $model = new Cursos();
        $this->render("create", array("model" => $model));
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

        if (isset($_POST['Cursos'])) {
            $model->attributes = $_POST['Cursos'];
            $fecha = explode(' - ', $_POST['Cursos']['fecha_inicio']);

            if (count($fecha) == 2) {
                $model->fecha_inicio = $fecha[0];
                $model->fecha_cierre = $fecha[1];
            }  else {
                $model->fecha_inicio = '';
                $model->fecha_cierre = '';
            }
                
            if ($model->validate() && $model->save())
            {    
                $user = Yii::app()->getComponent('user');
                $user->setFlash(
                            'success', "<strong>Exito!</strong> Se a modificiado el curso exitosamente."
                );
                $this->redirect(array('admin'));
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
            $model = $this->loadModel($id);
            $model->state_curso = 'inactive';
            $model->update();

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
        $dataProvider = new CActiveDataProvider('Cursos');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {

        $model = new Cursos('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Cursos']))
            $model->attributes = $_GET['Cursos'];

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
        $model = Cursos::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cursos-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
