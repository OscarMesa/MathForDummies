<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es" />

        <!-- blueprint CSS framework -->
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/template.css"/>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/app_script.js"></script>
<!--        <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.tools.min.js"></script>-->
        <?php 
            Yii::app()->clientScript->registerScript('procesando','$(function(){'
                    . ' $(document).submit(function() {
                            $(\'.procesando\').css(\'display\', \'block\');
                          setTimeout(function(){

                            $(\'.procesando\').css(\'display\', \'none\');

                         }, 7000);
                       });'
                    . '});');
        ?>
    </head>

    <body>
        <div id="cargando" class="alert alert-warning procesando alert-block" style="display: none;"><img src="<?php echo Yii::app()->getBaseUrl() . '/themes/OzAuLink/images/ajax-loader.gif';?>"/> <?php echo Yii::t('polimsn', 'Processing , Please wait a moment...') ?> </div>
        <div  class="grid_16">
            <?php
            $this->widget('bootstrap.widgets.TbAlert', array(
                'block' => true, // display a larger alert block?
                'fade' => true, // use transitions?
                'closeText' => '&times;', // close link text - if set to false, no close link is displayed
                'alerts' => array(// configurations per alert type
                    'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
                    'error' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
                    'info' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
                    'warning' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
                    'danger' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
                ),
            ));
            ?>
<?php echo $content; ?>
        </div>
    </body>
</html>