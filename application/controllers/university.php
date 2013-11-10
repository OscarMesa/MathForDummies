<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class University extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_university','muniversity');
    }

    public function LoadViewUniversity(){
    	$data['universities'] = $this->muniversity->getAllUniversities();
    	$this->load->view('view_universities',$data);
    }

}

/* End of file university.php */
/* Location: ./application/controllers/university.php */