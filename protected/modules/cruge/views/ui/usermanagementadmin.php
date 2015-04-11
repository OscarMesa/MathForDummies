<div class="form">
    <h1><?php echo ucwords(CrugeTranslator::t('admin', 'Manage Users')); ?></h1>
    <?php
    /*
      para darle los atributos al CGridView de forma de ser consistente con el sistema Cruge
      es mejor preguntarle al Factory por los atributos disponibles, esto es porque si se decide
      cambiar la clase de CrugeStoredUser por otra entonces asi no haya dependenci directa a los
      campos.
     */
    $cols = array();

// presenta los campos de ICrugeStoredUser
    foreach (Yii::app()->user->um->getSortFieldNamesForICrugeStoredUser() as $key => $fieldName) {
        $value = null; // default
        $filter = null; // default, textbox
        $type = 'text';
        if ($fieldName == 'state') {
            $value = '$data->getStateName()';
            $filter = Yii::app()->user->um->getUserStateOptions();
        }
        if ($fieldName == 'logondate') {
            $type = 'datetime';
        }
        $cols[] = array('name' => $fieldName, 'value' => $value, 'filter' => $filter, 'type' => $type);
    }

    $cols[] = array(
        'class' => 'CButtonColumn',
        'template' => '{update} {eliminar} {activar}',
        'deleteConfirmation' => CrugeTranslator::t('admin', '¿Está seguro que suspender la cuenta de este usuario?'),
        'buttons' => array(
            'update' => array(
                'label' => CrugeTranslator::t('admin', 'Update User'),
                'url' => 'array("usermanagementupdate","id"=>$data->getPrimaryKey())',
                'options' => array("rel" => "tooltip", 'class' => 'icon-trash')
            ),
            'eliminar' => array(
                'visible' => '$data->state == CRUGEUSERSTATE_SUSPENDED?false:true',
                'label' => CrugeTranslator::t('admin', 'Delete User'),
                'imageUrl' => Yii::app()->user->ui->getResource("delete.png"),
                'url' => 'array("usermanagementdelete","id"=>$data->getPrimaryKey())',
                'options' => array("data-original-title" => "Suspender", "rel" => "tooltip", 'class' => 'delete')
            ),
            'activar' => array(
                'visible' => '$data->state == CRUGEUSERSTATE_SUSPENDED?true:false',
                'label' => CrugeTranslator::t('admin', 'Enabled user account'),
                'imageUrl' => Yii::app()->user->ui->getResource("activate.png"),
                'url' => 'array("usermanagementActive","id"=>$data->getPrimaryKey())',
                'options' => array("data-original-title" => "Activar", "rel" => "tooltip", 'class' => 'delete')
            ),
        ),
    );
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type' => 'striped bordered condensed',
        'dataProvider' => $dataProvider,
        'columns' => $cols,
        'filter' => $model,
    ));
    ?>
</div>