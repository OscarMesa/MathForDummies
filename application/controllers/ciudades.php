<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Oskar
 */
class ciudades extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Este metodo me retorna a una vista un array de todas la ciudades, con su respectiva PK
     */
    
    public function getCiudades(){
        
        $this->load->model('model_ciudades', 'ciudades');
        return $this->ciudades->mod_getCiudades();
    
    }
}

?>
