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
			echo $this->input->post("recuperar");
			
    }
    public function registrar(){
			$this->load->library('form_validation');
			$this->load->helper(array('form'));
			$this->form_validation->set_rules('nombre', '"correo"', 'trim|required');
			$this->form_validation->set_rules('correo', '"correo"', 'trim|required|valid_email');
			$this->form_validation->set_rules('perfil', '"perfil"', 'trim|required');
			if($this->form_validation->run() == false){
				$rpt['rpt'] = false;
			}else{
				$query = $this->muser->ValidarRegistro( $this->input->post("nombre"), 
																						$this->input->post("correo"),
																						$this->input->post("perfil"));
				if($query->num_rows()>0){
					$rpt['rpt'] = true;
					$this->session->set_userdata($query->result_array()[0]);
				}else{
					$rpt['rpt'] = false;
				}
			}
		   echo json_encode($rpt);
    }
}

?>