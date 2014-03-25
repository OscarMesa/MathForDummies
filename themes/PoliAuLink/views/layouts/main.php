<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es" />

        <!-- blueprint CSS framework -->
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/template.css"/>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.tools.min.js"></script>
    </head>

    <body>

        <div class="container_16" id="page">

            <div id="header" class="grid_16">
                <div id="banner" class="grid_16 alpha omega">
                    <div align="center">
                        <h1>PoliAulaLink</h1>
                    </div>
                </div>
                <div class="clear"></div>
                <div id="menu_superior" class="grid_16 alpha omega"> <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => array(
                            array('label' => 'Ingresar', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                        ),
                    ));
                    ?>
                </div>
            </div><!-- header -->
            <div class="clear"></div>
            <div class="clear"></div>
            <div class="grid_3">  
                <div >
                    &nbsp;


                </div><!-- mainmenu -->
            </div>
            <div  class="grid_16">
                <?php echo $content; ?>
            </div>
            <div class="clear"></div>
            <div id="footer">
                <p style="text-align: center;">
                    oscar mesa
         








                    <?php /** @var TbActiveForm $form */
                    $form = $this->beginWidget(
                            'bootstrap.widgets.TbActiveForm', array(
                        'id' => 'horizontalForm',
                        'type' => 'horizontal',
                            )
                    );
                    ?>

                    <fieldset>

                        <legend>Legend</legend>

                    
                        <?php
                        $model = new Usuarios();
                        echo $form->datepickerRow(
                                $model, 'correo', array(
                            'options' => array('language' => 'es'),
                            //'hint' => 'Click inside! This is a super cool date field.',
                            //'prepend' => '<i class="icon-calendar"></i>'
                                )
                        );
                        ?>
            
                   
                      
                        
                     
                    
                       
                    </fieldset>

                    <div class="form-actions">
<?php
$this->widget(
        'bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'primary',
    'label' => 'Submit'
        )
);
?>
                        <?php
                        $this->widget(
                                'bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => 'Reset')
                        );
                        ?>
                    </div>
                    <?php
                    $this->endWidget();
                    unset($form);
                    ?>
                </p>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>