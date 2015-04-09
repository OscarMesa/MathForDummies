<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es" />

        <!-- blueprint CSS framework -->
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/app.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/template.css"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!--Ionicons--> 

        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/app_script.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/app.js"></script>
<!--        <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.tools.min.js"></script>-->
    </head>

    <body class="skin-blue">

        <div id="menu_superior" class="grid_16 alpha omega">
        </div>
        <div id="curso">
            <div id="panel_central">
                <div id="menu">
                    <?php
                    if (isset(Yii::app()->user->__perfiles) && Yii::app()->user->esProfesor()) {
                        ?>
                        <div id="op" class='activo'><a href="<?php echo Yii::app()->getBaseUrl(true) ?>/cursos/admin">Curso</a></div>
                        <div id="op"><a href="<?php echo Yii::app()->getBaseUrl(true) ?>/talleres/admin">Talleres</a></div>
                        <div id="op">Ejercicios</div>
                        <div id="op">Multimedia</div>
                        <div id="op">Evaluaciones</div>
                    <?php } ?>
                </div>
                <div id="form">
                    <div  class="grid_16">
                       <?php $this->widget('bootstrap.widgets.TbAlert', array(
                            'block'=>true, // display a larger alert block?
                            'fade'=>true, // use transitions?
                            'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
                            'alerts'=>array( // configurations per alert type
                                'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
                                'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
                                'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
                                'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
                                'danger'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
                            ),
                        )); ?>
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>

        </div>
        <div id="footer">
            <p style="text-align: center;">
            </p>
        </div><!-- footer -->

    </body>
</html>



<?php
    $this->widget('bootstrap.widgets.TbNavbar', array(
        'brand'=>'OzAuLink',
        //'brandUrl'=>'#',
        'fixed' => 'top',
        'collapse'=>true, // requires bootstrap-responsive.css,
        'htmlOptions'=>array(
        ),
        'items' => array(
                array(
                        'class'=>'bootstrap.widgets.TbMenu',
                        'isColapse' => true,
                        'items' => array(
                                        array('label' => 'Inicio', 'url' => array('/site/index')),
                                        array('label' => 'Contact', 'url' => array('/site/contact')),
                                        array('label' => 'Login'
                                            , 'url' => Yii::app()->user->ui->loginUrl
                                            , 'visible' => Yii::app()->user->isGuest
                                            ,),
                                        array('label' => 'BackUp'
                                            , 'url' => array('/jbackup')
                                            , 'visible' => !Yii::app()->user->isGuest
                                            , 'active'=> (!strstr(Yii::app()->controller->uniqueID, 'jbackup')?false:true),
                                            ),
                                        array('label' => 'Grados'
                                            , 'url' => array('/grado/admin')
                                            , 'visible' => Yii::app()->user->checkAccess('action_grado_admin'))
                                            , 'active'=> (!strstr(Yii::app()->controller->uniqueID, 'grado')?false:true),
                                        array('label' => 'Cursos'
                                            , 'url' => array('/cursos/curso')
                                            , 'visible' => Yii::app()->user->checkAccess('action_grado_admin')
                                            , 'active'=> (!strstr(Yii::app()->controller->uniqueID, 'cursos')?false:true),
                                            ),
                                        array('label' => 'Administrar Usuarios'
                                            , 'url' => Yii::app()->user->ui->userManagementAdminUrl
                                            , 'visible' => !Yii::app()->user->isGuest
                                            , 'active'=> (!strstr(strtolower(Yii::app()->controller->uniqueID), 'cruge')?false:true)
                                            ),
                                        array('label' => 'Areas'
                                            , 'url' => array("/area/admin")
                                            , 'visible' => !Yii::app()->user->isGuest
                                            , 'active'=> (!strstr(strtolower(Yii::app()->controller->uniqueID), 'area')?false:true)
                                            ),
                                        array('label' => 'Asignaturas'
                                            , 'url' => array("/asignatura/admin")
                                            , 'visible' => !Yii::app()->user->isGuest
                                            , 'active'=> (!strstr(strtolower(Yii::app()->controller->uniqueID), 'asignatura')?false:true)
                                            ),    
                                        array('label' => 'Logout('.Yii::app()->user->name.')'
                                            , 'url' => Yii::app()->user->ui->logoutUrl
                                            , 'visible' => !Yii::app()->user->isGuest),
                                    ),
                ),
        ),
    ));
    
//    echo Yii::app()->controller->getId;
//    echo Yii::app()->controller->id;
//    echo Yii::app()->controller->uniqueID;
//    echo Yii::app()->controller->uniqueID;
//var_dump(strstr(strtolower(Yii::app()->controller->uniqueID), 'cruge'));
//    die;
?>


<?php echo Yii::app()->user->ui->displayErrorConsole(); ?>

