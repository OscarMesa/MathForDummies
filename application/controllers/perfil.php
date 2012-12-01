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
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_perfil','mperfil');
	}
	

        
    public function LoadAutoComplete()
	{
		$query = $this->mperfil->getProfileFilter($_POST['filter']['filters'][0]['value']);
		$result = array();

		foreach ($query as $value) {
			$result[] = array('id' => $value['id_perfil'], 'nombre' => $value['nombre']);
		}
		echo json_encode($result);
	}
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
