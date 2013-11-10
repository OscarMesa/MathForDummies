<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Equations extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_equations','mequations');
    }
    public function getAllEcuations()
    {
    	$data['equations'] = $this->mequations->getAllEquations();
    	$this->load->view('view_equations',$data);
    }
}

/* End of file equations.php */
/* Location: ./application/controllers/equations.php */