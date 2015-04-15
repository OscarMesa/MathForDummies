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
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/activo.png"/>
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/activo.png"/>
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/activo.png"/>
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/activo.png"/>
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/activo.png"/>
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/activo.png"/>
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/activo.png"/>
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/activo.png"/>
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/activo.png"/>
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo Yii::app()->theme->baseUrl; ?>/images/activo.png"/>
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/activo.png"/>
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/activo.png"/>
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/activo.png"/>
        <link rel="manifest" href="/manifest.json"/>
        <meta name="msapplication-TileColor" content="#ffffff"/>
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png"/>
        <meta name="theme-color" content="#ffffff"/>
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
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>

        </div>



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
                                        array('label' => 'Contáctanos', 'url' => array('/site/contact')),
                                        array('label' => 'Iniciar sesión'
                                            , 'url' => array('site/login')
                                            , 'visible' => Yii::app()->user->isGuest
                                            ,),
                                        
                                        array('label' => 'Salir'
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


<?php 
 //echo Yii::app()->user->ui->displayErrorConsole(); 
 ?>

