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

}

/* End of file professions.php */
/* Location: ./application/controllers/professions.php */