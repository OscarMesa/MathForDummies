<h1><?php echo CrugeTranslator::t('logon', "Login"); ?></h1>
<?php if (Yii::app()->user->hasFlash('loginflash')): ?>
    <div class="flash-error">
        <?php echo Yii::app()->user->getFlash('loginflash'); ?>
    </div>
<?php else: ?>
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'logon-form',
        'type' => 'horizontal',
        'enableClientValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>
    <fieldset>

        <?php echo $form->textFieldRow($model, 'username', array('hint' => '')); ?>

        <?php echo $form->passwordFieldRow($model, 'password', array('hint' => '')); ?>

        <?php echo $form->checkBoxRow($model, 'rememberMe', array()); ?>

        <?php
        //	si el componente CrugeConnector existe lo usa:
        //
	if (Yii::app()->getComponent('crugeconnector') != null) {
            if (Yii::app()->crugeconnector->hasEnabledClients) {
                ?>
                <div class='crugeconnector'>
                    <span><?php echo CrugeTranslator::t('logon', 'You also can login with'); ?>:</span>
                    <ul>
                        <?php
                        $cc = Yii::app()->crugeconnector;
                        foreach ($cc->enabledClients as $key => $config) {
                            $image = CHtml::image($cc->getClientDefaultImage($key));
                            echo "<li>" . CHtml::link($image, $cc->getClientLoginUrl($key)) . "</li>";
                        }
                        ?>
                    </ul>
                </div>
                <?php
            }
        }
        ?>
    </fieldset>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => CrugeTranslator::t('logon', "Login"))); ?>
        <?php echo Yii::app()->user->ui->passwordRecoveryLink; ?>
        <?php
        if (Yii::app()->user->um->getDefaultSystem()->getn('registrationonlogin') === 1)
            echo Yii::app()->user->ui->registrationLink;
        ?>
    </div>

    <?php $this->endWidget(); ?>

<?php endif; ?>