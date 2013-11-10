<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesores extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_profesores','teachers');
	}

	public function getAllTeacher()
	{
		$t = $this->teachers->getAllTeacherFilter($this->input->post('value'));
		echo json_encode($t);
	}
}

/* End of file profesores.php */
/* Location: ./application/controllers/profesores.php */