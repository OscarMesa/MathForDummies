<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            if($this->config->item('session')){
			$this->load->helper('timesocial');
			$this->load->model('model_Publicaciones');
			$data['publicaciones']=$this->model_Publicaciones->obtenerPublicaciones(2,2);
			$data['mensajes']=$this->model_Publicaciones->obtenerMensajes(2);
			$this->plantilla->Render('perfil/inicio',$data,true);
            }else{
                redirect('/', 'refresh'); 
            }
	}
	
	        
        
}
