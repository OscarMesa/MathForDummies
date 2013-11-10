<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller {

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
			$this->load->helper('timesocial');
			$this->load->model('model_Publicaciones');
			$data['publicaciones']=$this->model_Publicaciones->obtenerPublicaciones(2);
			$this->plantilla->Render('perfil/perfil',$data,true);
	}
	
	public function user($nameUser)
	{
			$this->load->helper('timesocial');
			$this->load->model('model_Publicaciones');
			$this->load->model('model_Usuario');
			$idUsuario=$this->model_Usuario->idUsuario($nameUser);
			if(!is_null($idUsuario)){
				$data['usuario']=$this->model_Usuario->obtenerInfoUsuario($idUsuario);
				$data['universidades']=$this->model_Usuario->obtenerUniversidades($idUsuario);
				$data['empleos']=$this->model_Usuario->obtenerEmpleos($idUsuario);
				$data['publicaciones']=$this->model_Publicaciones->obtenerPublicaciones($idUsuario);
				$this->plantilla->Render('perfil/perfil',$data,true);
			}else{
				$this->plantilla->Render('perfil/not-found',NULL,true);
			}
	}
        
    public function feed()
	{
		
	}
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
