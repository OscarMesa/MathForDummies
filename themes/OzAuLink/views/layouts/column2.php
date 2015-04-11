<?php $this->beginContent('//layouts/main'); ?>

 <?php // if(!Yii::app()->user->isGuest)
     echo $this->renderPartial('application.views.layouts._menu'); ?>
<div class="content-wrapper" style="min-height: 884px;">
    
    <div class="alpha grid_3">
    
        <div id="sidebar">
            &nbsp;
        
    </div><!-- sidebar -->
</div> 
    <div class="grid_13 omega">
        <div id="content">
            <div id="messages-app">
                <?php echo $this->renderpartial('application.views.flash._messagesPpal');?>
            </div>
            <?php echo $content; ?>
        </div><!-- content -->
    </div>

</div>
<?php $this->endContent(); ?>