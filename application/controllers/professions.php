<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Professions extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_professions','mprofessions');
    }

    public function LoadViewProfessions(){
    	$data['profession'] = $this->mprofessions->getAllProfessions();
    	$this->load->view('view_professions',$data);
    }

    public function LoadAutoComplete(){
    	$element = $this->mprofessions->LoadProfetionAutocomplete($_POST['filter']['filters'][0]['value']);
    	$arr = array();
    	foreach ($element as $key => $value) {
    		$arr[] = array('id' => $value['id_profesion'], 'nombre' =>$value['descripcion']);
    	}
    	echo json_encode($arr);
    }
}

/* End of file professions.php */
/* Location: ./application/controllers/professions.php */