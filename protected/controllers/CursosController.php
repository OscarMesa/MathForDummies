<?php

class CursosController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $render = true;

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
     * Este metodo permite validar si un usuario ya esta registrado en un curso o no.
     * @param type $id_usuario
     * @return boolean Description
     */
    public function validarExitenciaUsuarioEnCurso($id_usuario, $id_curso) {
        if (IntegrantesCurso::model()->count("id_integrante = ? AND cursos_id = ? AND estado = ?", array($id_usuario, $id_curso, ACTIVE)) > 0)
            return true;
        else
            return false;
    }

    /**
     * Este metodo verifica s
     * @param type $codigo
     * @param type $id_curso
     * @return boolean
     */
    public function validarCodigoEnCurso($codigo, $id_curso) {
        if (CodigoIngresoCurso::model()->count('codigo_verficacion = ? AND id_curso = ? AND estado = ?', array($codigo, $id_curso, ACTIVE)) > 0)
            return true;
        else
            return false;
    }

    /**
     * 
     * @throws Exception
     */
    public function actionAgregarEstudiantexCodigo() {
        $cod = $_REQUEST['codigo'];
        $id_curso = $_REQUEST['id_curso'];
        $respuesta = array('respuesta' => false, 'mensaje' => '');
        if (!$this->validarExitenciaUsuarioEnCurso(Yii::app()->user->id, $id_curso)) {
            if ($this->validarCodigoEnCurso($cod, $id_curso)) {
                $this->render = false;
                $_POST['estudiantes'] = Yii::app()->user->id;
                $this->actionAgregarEstudiantes($id_curso);
                $respuesta['respuesta'] = true;
                $respuesta['mensaje'] = Yii::app()->user->getFlash('success');
            } else {
                $respuesta['mensaje'] = Yii::t('polimsn', 'The code entered does not exist for this course');
            }
        } else {
            $respuesta['mensaje'] = Yii::t('polimsn', 'The user is already connected to the course');
        }
        echo json_encode($respuesta);
    }

    /**
     * este mètodo me elimna un usuario del curso.
     * @author Oskar<oscarmesa.elpoli@gmail.com>
     */
    public function actionEliminarUsuarioCurso() {
        $integrante_cursos = IntegrantesCurso::model()->find(array('condition' => 'cursos_id=? AND id_integrante=?', 'params' => array($_REQUEST['curso'], $_REQUEST['estudiante'])));
        $integrante_cursos->estado = INACTIVE;
        if (!$integrante_cursos->update())
            throw new Exception("No se pudo actualizar");
    }

    /**
     * Me permite agregar estudiantes en el curso.
     * @param type $id
     */
    public function actionAgregarEstudiantes($id) {
        if ($id > 0) {
            $this->layout = "//layouts/column3";
            $curso = Cursos::model()->findByPk($id, array(
                'with' => array(
                    'temas' => array(
                        'condition' => "estado='active'"
                    )
                )
            ));
            $modEstudiante = new MathUserC();
            if ($curso != null) {
//                print_r($_REQUEST);die;
                if (isset($_POST['estudiantes'])) {
//                    print_r($_REQUEST);die;
                    $t = Yii::app()->db->beginTransaction();
                    try {
                        $integran_cursos = new IntegrantesCurso();
                        $integran_cursos->id_integrante = $_POST['estudiantes'];
                        $integran_cursos->cursos_id = $id;
                        $integran_cursos->estado = ACTIVE;
                        $usuario = Yii::app()->user->um->loadUserById($_POST['estudiantes']);
                        try {
                            $integran_cursos->save();
                        } catch (CDbException $ex) {
                            if ($ex->errorInfo[1] == 1062) {
                                $integran_cursos->updateAll(array('estado' => 1), 'id_integrante = ' . $_POST['estudiantes'] . ' AND cursos_id = ' . $id);
                            } else {
                                print_r($ex);
                                die;
                            }
                        }
                        $this->enviarNotificacionEstudianteAgregado($usuario, $curso);
                        $m = Yii::t('polimsn', 'The student successfully been added , is to send an email to {mail}', array('{mail}' => $usuario->email));
                        $user = Yii::app()->getComponent('user')->setFlash(
                                'success', $m
                        );
                        $t->commit();
                    } catch (Exception $e) {
                        print_r($e);
                        $errores = "<strong>Verfique la información: </strong><br/>";
                        foreach ($integran_cursos->getErrors() as $errorField => $errorsArray) {
                            foreach ($errorsArray as $value) {
                                $errores .="<span style='font-size:13px;'>" . $value . "</span><br>";
                            }
                        }

                        $user = Yii::app()->getComponent('user');
                        $user->setFlash(
                                'error', $errores
                        );
                        $t->rollback();
                    }
                }
                if ($this->render) {
                    $this->render('agregarEstudiante', array(
                        'dataproviderEstudiantes' => $modEstudiante->participantesCurso($id),
                        'model' => $modEstudiante,
                        'id' => $id
                    ));
                }
            } else {
                throw new CHttpException(400, 'Este curso no existe o no tiene temas vinculados.');
            }
        } else {
            throw new CHttpException(400, 'El identificador del curso debe ser mayor a 0.');
        }
    }

    /**
     * Este metodo se encarga de enviar una notificación al nuevo estudiante en el curso.
     * @param CrugeField $usuario
     * @param Cursos $curso
     */
    public function enviarNotificacionEstudianteAgregado($usuario, $curso) {
        Yii::import('ext.yii-mail.YiiMailMessage');
        $message = new YiiMailMessage;
        $message->view = "usuarioAgregadoCurso";
        $params = array('curso' => $curso, 'usuario' => $usuario);
        $message->subject = Yii::t('polimsn', 'Successful linkage course {name_course}', array('{name_course}' => ucwords($curso->nombre_curso)));
        $message->setBody($params, 'text/html');
        $message->to = array($usuario->email => 'importaciones');
        $message->from = array(Yii::app()->params['email'] => Yii::app()->name);
        Yii::app()->mail->send($message);
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
            } else {
                $model->fecha_inicio = '';
                $model->fecha_cierre = '';
            }
            if ($model->save()) {
                $user = Yii::app()->getComponent('user');
                $user->setFlash(
                        'success', "<strong>Exito!</strong> Se guardo el curso fue creado exitosamente."
                );
                $this->redirect(Yii::app()->getBaseUrl(true) . '/cursos/update/' . $model->id);
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function render($view, $data = null, $return = false) {
        parent::render($view, $data, $return);
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
            } else {
                $model->fecha_inicio = '';
                $model->fecha_cierre = '';
            }

            if ($model->validate() && $model->save()) {
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
        } else
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
