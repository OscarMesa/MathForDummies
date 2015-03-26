<?php
/**
 * 
 * @author Oskar <oscarmesa.elpoli@gmail.com>
 */

class TemaController extends Controller {

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
        /*return array(
            'accessControl', // perform access control for CRUD operations
        );*/
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
        $this->layout ="modal";
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'curso' => $curso,
        ));
    }
    
    /**
     * Esta accion se encarga de activar un tema.
     * @param type $id
     */
    public function actionActive($id)
    {
        print_r($_GET);
        echo $id;
        
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $estado = $this->loadModel($id);
            $estado->estado = 'active';
            $estado->save();
// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id) {
        $this->layout = "modal";
        $model = new Tema();

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Tema'])) {
            $model->attributes = $_POST['Tema'];
            if ($model->save()){
                $user = Yii::app()->getComponent('user');
                $user->setFlash(
                            'success', "<strong>Exito!</strong> El tema fue almacenado exitosamente."
                );
                $this->redirect(Yii::app()->getBaseUrl(true).'/tema/view/'.$model->idcurso);
                $this->redirect(array('create', 'id' => $model->idtema));
            }
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
        $this->layout = 'modal';
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Tema'])) {
            $model->attributes = $_POST['Tema'];
            if ($model->save()){
                $user = Yii::app()->getComponent('user');
                $user->setFlash(
                            'success', "<strong>Exito!</strong> ".Yii::t('polimsn', 'the issue was updated successfully')
                );
                $this->redirect(array('view', 'id' => $model->idtema));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'curso' => $curso,
            'curso' => Cursos::model()->findByPk($_GET['idcurso'])
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
            $estado = $this->loadModel($id);
            $estado->estado = 'inactive';
            $estado->save();
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
        $dataProvider = new CActiveDataProvider('Tema');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($id) {
        $this->layout = "modal";
        $model = new Tema('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Tema']))
            $model->attributes = $_GET['Tema'];
        $model->idcurso = $id;

        $this->render('admin', array(
            'model' => $model,
            'curso' => Cursos::model()->findByPk($id),
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Tema::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tema-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
