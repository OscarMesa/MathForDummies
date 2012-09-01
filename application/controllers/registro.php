<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of resgistro
 *
 * @author JOSH
 */

require 'ciudades.php';

class Registro extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->library('plantilla');
        $this->load->ciudades = new ciudades();
    }
    
    public function index() {
        if(!$this->config->item('session')){
            $data['ciudades'] = $this->load->ciudades->getCiudades();
            $data['registro'] = TRUE;
            $this->plantilla->Render('registro',$data);
        }else{
            redirect('/inicio/', 'refresh');
        }
        
    }
}

?>
