<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author omesagar
 */
class Model extends CActiveRecord{
    private $save = false; 
    protected function afterSave() {
        parent::afterSave();
        $this->save = true;
    }
    
    function getSave() {
        return $this->save;
    }

    function setSave($save) {
        $this->save = $save;
    }

}
