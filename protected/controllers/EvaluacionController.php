<?php

class EvaluacionController extends Controller {

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

    public function resta($inicio, $fin) {
        $dif = date("H:i:s", strtotime("00:00:00") + strtotime($fin) - strtotime($inicio));
        return $dif;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param int $id Identificador del curso.
     */
    public function actionCreate($id) {
        $model = new Evaluacion();
        $Mejercicios = new Ejercicios('search');
        $this->layout = "modal";
        if (isset($_POST['Evaluacion'])) {
            $model->attributes = $_POST['Evaluacion'];
            $model->estado_evaluación = ACTIVE;
            $fecha = explode(' - ', $_POST['Evaluacion']['fecha_inicio']);
//            echo '<pre>';
//            print_r($model->temas);
//            print_r($model->ejercicios);die();
            if (count($fecha) == 2) {
                $fecha1 = explode(" ", $fecha[0]);
                $k = $fecha1[1] . " " . $fecha1[2];
                $model->fecha_inicio = $fecha1[0] . " " . date("H:i", strtotime($k));
                $model->prefijo_horario_fini = $fecha1[2];
                $fecha2 = explode(" ", $fecha[1]);
                $k = $fecha2[1] . " " . $fecha2[2];
                $model->fecha_fin = $fecha2[0] . " " . date("H:i", strtotime($k));
                $model->prefijo_horario_ffin = $fecha2[2];
                $model->tiempo_limite = $this->resta($model->fecha_inicio, $model->fecha_fin);

                $datetime1 = new DateTime($model->fecha_fin);
                $datetime2 = new DateTime($model->fecha_inicio);
                $model->tiempo_limite = $this->getIntervalUnits($datetime1->diff($datetime2));
            }

            if ($model->save()){
                $model->cursos_id = Yii::app()->db->getLastInsertId();
                $this->redirect(array('update', 'id' => $model->cursos_id));
            }
        }
        $model->cursos_id = $id;
        $curso = Cursos::model()->findByPk($id);
        $Mejercicios->idMateria = $curso->idmateria;
        $Mejercicios->idusuariocreador = Yii::app()->user->id;
        $temas = Tema::model()->findAll(array('condition' => 'estado="active" AND idcurso=?', 'params' => array($id)));
        $select_array = array();
        $this->render('create', array(
            'model' => $model,
            'curso' => Cursos::model()->findByPk($id),
            'temas' => $temas,
            'Mejercicios' => $Mejercicios,
            'select_array' => $select_array
        ));
    }

    public function getIntervalUnits($interval) {
        // Day
        $total = $interval->format('%a');

        //hour
        $total = ($total * 24) + ($interval->h );
        //min
        $total = ($total * 60) + ($interval->i );
        //sec
        $total = ($total * 60) + ($interval->s );

        return $total;
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

        if (isset($_POST['Evaluacion'])) {
            $model->attributes = $_POST['Evaluacion'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->cursos_id));
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
        $dataProvider = new CActiveDataProvider('Evaluacion');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $this->layout = "modal";
        $model = new Evaluacion('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Evaluacion']))
            $model->attributes = $_GET['Evaluacion'];

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
        $model = Evaluacion::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'evaluacion-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
