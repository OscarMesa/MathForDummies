<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ejercicios extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_excercices', 'mexcercices');
    }

    public function getAllExcrcies()
    {
    	$data['excercices'] = $this->mexcercices->getAllExcerices();
    	$this->load->view('view_excercies',$data);
    }

}

/* End of file ejercicios.php */
/* Location: ./application/controllers/ejercicios.php */