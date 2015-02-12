<?php /* @var $this Controller */ ?>
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
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
 
<div class="span-5 last">
	<div id="sidebar">
	<?php
//		$this->beginWidget('zii.widgets.CPortlet', array(
//			'title'=>'Operations',
//		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
//		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>