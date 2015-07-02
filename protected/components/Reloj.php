<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reloj plugin
 *
 * @author Oskar
 */
Yii::import('zii.widgets.CPortlet');

class reloj extends CPortlet {

    public $cs;

    public function __construct() {
        $this->baseUrl = Yii::app()->baseUrl; 
        $this->cs = Yii::app()->getClientScript();
        parent::__construct();
    }

    protected function renderContent()
    {
        $this->render('reloj');
    }
    
    public function registerScriptJS()
    {
        $this->cs->registerScriptFile($this->baseUrl.'/js/reloj/jquery.lwtCountdown-1.0.js');
        $this->cs->registerScriptFile($this->baseUrl.'/js/reloj/main.js');
    }
    
    public function registerStyleCSS()
    {
        $this->cs->registerCssFile($this->baseUrl.'/css/reloj/dropzone.css');
        $this->cs->registerCssFile($this->baseUrl.'/css/reloj/main.css');
    }
}