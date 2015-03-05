<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Summernote
 *
 * @author omesagar
 */
Yii::import('zii.widgets.CPortlet');

class Summernote extends CPortlet {
    public $title='Summernote';
    public $cs;
    public $baseUrl;
    
    public function __construct() {
        $this->baseUrl = Yii::app()->baseUrl; 
        $this->cs = Yii::app()->getClientScript();
        parent::__construct();
    }
    
    protected function renderContent()
    {
        $this->render('summernote');
    }
    
    public function registerScriptJS()
    {
        $this->cs->registerScriptFile($this->baseUrl.'/js/summernote.min.js');
        $this->cs->registerScriptFile($this->baseUrl.'/js/app-summernote.js');
//        $this->cs->registerScriptFile($this->baseUrl.'/js/bootstrap_3.0.1.js');
    }
    
    public function registerStyleCSS()
    {
        $this->cs->registerCssFile("http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css");
        $this->cs->registerCssFile($this->baseUrl.'/css/summernote-bs2.css');
//        $this->cs->registerCssFile($this->baseUrl.'/css/summernote-bs3.css');
        $this->cs->registerCssFile($this->baseUrl.'/css/summernote.css');
    }
}
