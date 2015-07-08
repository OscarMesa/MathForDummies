<?php

class AsignaturaController extends Controller {

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
        return array(
        );
    }
    public function actionObtenerDatosAsignatura() {
        if (Yii::app()->request->isPostRequest) {
            $m = Materias::model()->findByPk($_POST['asignatura']);
            $materias = Materias::model()->findAll(array('condition'=>'idarea=? AND idmaterias != ?','params'=>array($m->idarea,$m->idmaterias)));
            $r_materias = array();
            foreach ($materias as $ma) {
                $r_materias[] = $ma->attributes;
            }
            $r_materias[] = $m->attributes;
            echo CJSON::encode(array('asignaturas'=>$r_materias, 'asignatura'=>$m->attributes,'area'=>$m->area->attributes));
        }else{
            throw new CHttpException(400, Yii::t('polimsn', 'Invalid request. Please do not repeat this request again.'));
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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Materias;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Materias'])) {
            $model->attributes = $_POST['Materias'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idmaterias));
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

        if (isset($_POST['Materias'])) {
            $model->attributes = $_POST['Materias'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idmaterias));
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
            $m = $this->loadModel($id);
            $m->state_materia = 'inactive';
            $m->update();
// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, Yii::t('polimsn', 'Invalid request. Please do not repeat this request again.'));
    }
    
    /**
     * Este metodo se encarga de listar las asignaturas de un area que es enviada
     * @author Oskar<oscarmesa.elpoli@gmail.com>
     */
    public function actionListarAsignaturasXArea()
    {
        $idArea = $_POST['id'];
        $asignaturas = Materias::model()->findAll('idarea = ? AND estado_id = ?',array($idArea,ACTIVE));
        $result = array();
        foreach ($asignaturas as $asignatura) {
            $result[] = array('id'=>$asignatura->idmaterias,'text'=>$asignatura->nombre_materia);
        }
        echo json_encode($result);
    }
    
    public function actionActive($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $m = $this->loadModel($id);
            $m->state_materia = 'active';
            $m->update();
// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, Yii::t('polimsn', 'Invalid request. Please do not repeat this request again.'));
    }
    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Materias');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Materias('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Materias']))
            $model->attributes = $_GET['Materias'];

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
        $model = Materias::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'materias-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
