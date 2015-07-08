<?php

class EvaluacionIntegranteController extends Controller {

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
     * Mediante este metodo se inicia la evaluacion de un usuario en el uno de los cursos.
     * @param int $id Id de evaluacion del integrante.
     */
    public function actionIniciarEvaluacion($id) {
        $ev_integratnte = EvaluacionIntegrante::model()->findByPk($id);
        $ev_integratnte->fecha_inicio = date('Y-m-d H:i:s');
        $ev_integratnte->save();
        echo json_encode(Utilidades::dividirFecha($ev_integratnte->idEvaluacion->fecha_fin));
    }

    public function actionTerminarEvaluacion($id) {
        $ev_integratnte = EvaluacionIntegrante::model()->findByPk($id);
        $ev_integratnte->fecha_fin = date('Y-m-d H:i:s');
        $r = array('buenas' => array(), 'malas' => array());
        $notaFinal = 0;
        foreach ($ev_integratnte->idEvaluacion->ejerciciosEvaluacion as $ejer_evalu) {
            //echo $ejer_evalu->ejercicio->ejercicio;
            //print_r($ejer_evalu->ejercicio->respuestasVerdaderas);
            $cont = 0;
            $id_respuesta = "";
            //estas son las respuestas verdaderas
            foreach ($ejer_evalu->ejercicio->respuestasVerdaderas as $respuesta) {
                $id_respuesta .= $respuesta->idRespuestaEjercicio . ",";
                $cont++;
            }
//            if($ejer_evalu->ejercicio->id_ejercicio == 4)
//                echo "oscar ".$cont."<br>".count($ev_integratnte->repuestasUsuario);
//            
            $id_respuesta = rtrim($id_respuesta, ",");
            //buscamos cuales fueron las respuestas verdaderas hechas por el usuario
            $respuestas_usuario = EjerciciosRespuestaUsuario::model()->findAll('id_usuario='.Yii::app()->user->id.' AND id_respuesta IN(' . $id_respuesta . ')');
            //Si la cantidad de respuestas hechas por el usuario son iguales a la candidad de respuestas verdaderas del ejercicio y si la cantidad de respuestas hechas por el usuario menor o igual ya que si yo tengo varias respuestas hechas en seleccion multiple y contesto todas bien y marco tambien malas, se debe tomar como si el ejercicio no fuera bueno y debe pasar a la otra opcion y no entrar por aqui. 
            if (count($respuestas_usuario) == $cont) {
                $notaFinal += ($ejer_evalu->valoracion_porcentaje / 100) * 5;
                $r['buenas'][] = array($id_respuesta => $ejer_evalu->ejercicio->attributes);
            } else {
                $notaFinal += ((count($respuestas_usuario) / $cont) * (($ejer_evalu->valoracion_porcentaje / 100) * 5));
                $r['malas'][] = array($id_respuesta => $ejer_evalu->ejercicio->attributes);
            }
        }
        if(!isset($_REQUEST['no_guardad']))
            $ev_integratnte->save();
        $ev_integratnte->guardarNotaSeguminetoUsuario($notaFinal);
        echo json_encode(array('notaFinal' => $notaFinal, 'Nbuenas' => count($r['buenas']), 'Nmalas' => count($r['malas']), 'resultados' => $r));
    }

    public function calculoHario($fecha_fin, $fecha_inicio) {
        return Utilidades::timestampToHuman(strtotime($fecha_fin) - strtotime($fecha_inicio));
    }
    
    /**
     * Este metodo se encarga de buscar una nota asociada a la evaluacion
     * @param int $evaluacion_integrante_id Description
     */
    public function buscarCalificacionEvaluacionIntegrante($evaluacion_integrante_id)
    {
        $n = NotaSeguimientoUsuario::model()->find('evaluacion_integrante_id=?', array($evaluacion_integrante_id));
        return count($n);
    }
    
    public function gurdarNotaSeguimientoEvaluacion($id_usuario,$f){
        
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {

        if (isset($_POST['EvaluacionIntegrante'])) {
            if (isset($_POST['respuesta'])) {
                foreach ($_POST['respuesta'] as $ejericio => $respuesta) {
                    if (is_array($respuesta)) {
                        foreach ($respuesta as $respuesta_id => $seleccionado) {
                            $this->eliminarRepuestasEjercicoEvaluado($_REQUEST['evaluacion_integrante_id'], $respuesta_id);
                            $this->guardarRespuestaEvaluacion($_REQUEST['evaluacion_integrante_id'], $_REQUEST['user_id'], $respuesta_id);
                        }
                    } else {
                        $this->eliminarRepuestasEjercicoEvaluado($_REQUEST['evaluacion_integrante_id'], $respuesta);
                        $this->guardarRespuestaEvaluacion($_REQUEST['evaluacion_integrante_id'], $_REQUEST['user_id'], $respuesta);
                    }
                }
            }
            $model = EvaluacionIntegrante::model()->find('id_evaluacion = ? AND id_integrante_curso = ?', array($_REQUEST['id_evaluacion'], Yii::app()->user->id));
            $model->scenario = 'saveEjercicios';
            if ($model->validate()) {
//                echo '<pre>';print_r($_REQUEST);die;
                if ($_REQUEST['terminar_evaluacion'] == 1) {
                    $model->fecha_fin = date('Y-m-d H:i:s');
                    if($model->save()){
                        
                        Yii::app()->user->setFlash('success', "<strong>Exito! </strong>" . Yii::t('polimsn', 'The evaluation successfully completed'));
                    }
                } else {
                    Yii::app()->user->setFlash('success', "<strong>Exito! </strong>" . Yii::t('polimsn', 'The evaluation was stored successfully'));
                }
            }
        } else {
            $model = EvaluacionIntegrante::model()->find('id_evaluacion = ? AND id_integrante_curso = ?', array($_REQUEST['id_evaluacion'], Yii::app()->user->id));

            if (is_null($model)) {
                $model = new EvaluacionIntegrante();
                $model->id_evaluacion = $_REQUEST['id_evaluacion'];
                $model->id_integrante_curso = Yii::app()->user->id;
                $model->save();
                $model->evaluacion_integrante_id = Yii::app()->db->getLastInsertID();
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Este metodo busca las respuestas hechas por el usuario.
     * @param Respuestaejercicio $respuestas
     */
    public function buscarRespuestasActivas($respuestas) {
        $respuestas_id = "";
        foreach ($respuestas as $respuesta) {
            $respuestas_id .= $respuesta->idRespuestaEjercicio . ",";
        }
        $respuestas_id = rtrim($respuestas_id, ',');
        if (!empty($respuestas_id)) {
            return EjerciciosRespuestaUsuario::model()->findAll('id_respuesta IN(' . $respuestas_id . ')');
        } else {
            return null;
        }
    }

    /**
     * 
     * @param type $evaluacion_integrante_id
     * @param type $id_usuario
     * @param type $id_respuesta
     * @return int
     */
    public function guardarRespuestaEvaluacion($evaluacion_integrante_id, $id_usuario, $id_respuesta) {
        $model = new EjerciciosRespuestaUsuario();
        $model->evaluacion_integrante_id = $evaluacion_integrante_id;
        $model->id_usuario = $id_usuario;
        $model->id_respuesta = $id_respuesta;
        if ($model->save())
            return Yii::app()->db->getLastInsertId();
        else
            return 0;
    }

    /**
     * Este metodo se encarga de elimnar todas las respuestas hechas por un usuario en un evaluacion
     * @param int $id_respuesta
     * @param int $evaluacion_integrante_id
     */
    public function eliminarRepuestasEjercicoEvaluado($evaluacion_integrante_id, $id_respuesta) {
        EjerciciosRespuestaUsuario::model()->deleteAll(array('condition' => 'evaluacion_integrante_id = ? AND id_respuesta IN (SELECT idRespuestaEjercicio FROM respuestaejercicio WHERE id_ejercicio = (SELECT id_ejercicio FROM respuestaejercicio WHERE idRespuestaEjercicio = ? LIMIT 1))', 'params' => array($evaluacion_integrante_id, $id_respuesta)));
    }

    /**
     * Este metodo se encarga de guardar una respuesta de un ejercicio hecha por un usuario.
     */
    public function actionGuardarEjercicio() {
        $transaction = Yii::app()->db->beginTransaction();
        $msg = Yii::t('polimsn', 'The answer was inserted correctly');
        $error = 0;
        if ($_REQUEST['tipo'] == 'u') {
            try {
                foreach ($_REQUEST['respuesta'] as $ejercio_id => $array) {
                    foreach ($array as $rand => $respuesta_id) {
                        $this->eliminarRepuestasEjercicoEvaluado($_REQUEST['evaluacion_integrante_id'], $respuesta_id);
                        $id = $this->guardarRespuestaEvaluacion($_REQUEST['evaluacion_integrante_id'], $_REQUEST['user_id'], $respuesta_id);
                    }
                }

                $transaction->commit();
            } catch (Exception $e) {
                $msg = Yii::t('polimsn', 'An error occurred during the Information Store idle');
                $error = 1;
                $transaction->rollback();
            }
            echo json_encode(array('id' => array($id), 'mensaje' => $msg, 'error' => $error));
        } else if ($_REQUEST['tipo'] == 'v') {
            $i = 0;
            $respuesta_ids = array();
            try {
                foreach ($_REQUEST['respuesta'] as $ejercios) {
                    $i = 0;
                    foreach ($ejercios as $respuesta_id => $r) {
                        if ($i == 0)
                            $this->eliminarRepuestasEjercicoEvaluado($_REQUEST['evaluacion_integrante_id'], $respuesta_id);
                        $id = $this->guardarRespuestaEvaluacion($_REQUEST['evaluacion_integrante_id'], $_REQUEST['user_id'], $respuesta_id);
                        $respuesta_ids[] = $id;
                        $i++;
                    }
                }
                $transaction->commit();
            } catch (Exception $e) {
                $msg = Yii::t('polimsn', 'An error occurred during the Information Store idle');
                $error = 1;
                $transaction->rollback();
            }
            echo json_encode(array('id' => array($respuesta_ids), 'mensaje' => $msg, 'error' => $error));
        }
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

        if (isset($_POST['EvaluacionIntegrante'])) {
            $model->attributes = $_POST['EvaluacionIntegrante'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->evaluacion_integrante_id));
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
        $dataProvider = new CActiveDataProvider('EvaluacionIntegrante');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new EvaluacionIntegrante('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['EvaluacionIntegrante']))
            $model->attributes = $_GET['EvaluacionIntegrante'];

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
        $model = EvaluacionIntegrante::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'evaluacion-integrante-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
