<?php

class SeguimientoUsuarioCursoController extends Controller {

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
        $this->layout = '//layouts/modal';
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }
    /**
     * http://yiiplayground.com/index.php?r=UiModule/dataview/gridViewArray
     * @param int $id  id del curso
     */
    public function actionNotas($id){
        $curso = Cursos::model()->findByPk($id);
        $seguimientos = SeguimientoUsuarioCurso::model()->findAll('id_curso=? AND estado_seguimiento=?',array($id,ACTIVE));
        $estudiantes = $curso->participantes;
        $rawData = array();
        foreach ($estudiantes as $estudiante) {
            $registro = array();
            $registro['id'] = $estudiante->iduser;
            $registro['estudiante'] = $estudiante;
            $registro['ColumnsNotaSeguimiento'] = array();
            
            foreach ($seguimientos as $seguimiento) {
//                if($seguimiento->estado_seguimiento == INACTIVE)continue;
                $registro[$seguimiento->id]['seguimiento'] = $seguimiento;
                $nota = NotaSeguimientoUsuario::model()->find('id_seguimiento_usuario_curso=? AND id_usuario = ?',array($seguimiento->id,$estudiante->iduser));
                if($nota != null)
                {
                    $registro[$seguimiento->id]['nota'] = $nota;
                }else{
                    $registro[$seguimiento->id]['nota'] = null;
                }
            }
            $rawData[] = $registro;
        }
        $arrayDataProvider = new CArrayDataProvider($rawData, array(
           'id'=>'id',
           /* 'sort'=>array(
               'attributes'=>array(
                   'username', 'email',
               ),
           ), */
           'pagination'=>array(
               'pageSize'=>10,
         ),
       ));
        
        $this->render('create', array(
                'model' => null,
                'curso' => Cursos::model()->findByPk($id),
                'arrayDataProvider' => $arrayDataProvider,
                'seguimientos' => $seguimientos,
            )
        );
    }
    
    public function actionModificarNota() {
        
    }
    
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param int $id id del curso
     */
    public function actionCreate($id) {
        echo $id;die;
        $model = new SeguimientoUsuarioCurso;
        $this->layout = '//layouts/modal';
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
        if (isset($_POST['SeguimientoUsuarioCurso'])) {
            $model->attributes = $_POST['SeguimientoUsuarioCurso'];
            if ($model->save())
                Yii::app()->user->setFlash('success', "<strong>Exito!</strong> El seguimiento fue creado correctamente." );
        }

        $this->render('createKW', array(
            'model' => $model,
            'curso' => Cursos::model()->findByPk($id),
            'id_curso' => $id
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

        if (isset($_POST['SeguimientoUsuarioCurso'])) {
            $model->attributes = $_POST['SeguimientoUsuarioCurso'];
            if ($model->save())
                    Yii::app()->user->setFlash('success', "<strong>Exito!</strong> El seguimiento de este curso fue actualizado correctamente." );
        }

        $this->render('updateKW', array(
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
        SeguimientoUsuarioCurso::model()->updateByPk($id,array('estado_seguimiento'=>INACTIVE));

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }
    
    public function actionActive($id) {
        if (Yii::app()->request->isPostRequest) {
        // we only allow deletion via POST request
        SeguimientoUsuarioCurso::model()->updateByPk($id,array('estado_seguimiento'=>ACTIVE));

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, Yii::t('polimsn','Invalid request. Please do not repeat this request again.'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('SeguimientoUsuarioCurso');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($id) {
        $model = new SeguimientoUsuarioCurso('search');
        $model->id_curso = $id; 
        $this->layout = '//layouts/modal';
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SeguimientoUsuarioCurso']))
            $model->attributes = $_GET['SeguimientoUsuarioCurso'];

        $this->render('admin', array(
            'model' => $model,
            'id_curso' => $id,
            'curso' => Cursos::model()->findByPk($id),
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = SeguimientoUsuarioCurso::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'seguimiento-usuario-curso-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
