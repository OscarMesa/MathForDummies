<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Summernote
 *
 * @author Dehost
 */
Yii::import('zii.widgets.CPortlet');

class dropzone extends CPortlet {

	public $baseUrl;
	public $cs;
    public $action;
	public $files=array();

    public function __construct() {
        $this->baseUrl = Yii::app()->baseUrl; 
        $this->cs = Yii::app()->getClientScript();
        parent::__construct();
    }

    protected function renderContent()
    {
        $this->render('dropzone');
    }
    
    public function registerScriptJS()
    {
        $this->cs->registerScriptFile($this->baseUrl.'/dropzone/dropzone.js');
    }
    
    public function registerStyleCSS()
    {
        $this->cs->registerCssFile($this->baseUrl.'/dropzone/dropzone.css');
        $this->cs->registerCssFile($this->baseUrl.'/dropzone/basic.css');
    }
}