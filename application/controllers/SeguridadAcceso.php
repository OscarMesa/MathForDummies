<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Seguridad
 *
 * @author Oskar
 */
class SeguridadAcceso extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {  
    }

    public function iniciar_sesion()
    {
        if($this->session->userdata('correo'))
        {
            redirect('/index'); 
        }
        else{
             $this->load->view('view_iniciar_sesion');
        }
    }


    public function recuperar(){
        $this->input->post("txt-recuperar");
    }
}

?>