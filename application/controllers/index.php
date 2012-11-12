<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'ciudades.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author Oskar
 */
class index extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {  
    		$data['prueba'] = 'hola diego';
            $this->plantilla->Render('index',$data);  
    }

}

?>
