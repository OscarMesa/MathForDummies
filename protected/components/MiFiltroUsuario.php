<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MiFiltroUsuario
 *
 * @author oskar
 */
class MiFiltroUsuario implements ICrugeUserFilter {
    public function canInsert(ICrugeStoredUser $model) {
        return true;
    }

    public function canUpdate(ICrugeStoredUser $model) {
        return true;
    }

//put your code here
}