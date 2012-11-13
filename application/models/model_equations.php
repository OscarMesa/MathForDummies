<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_equations extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getAllEquations(){
		$query = $this->db->query('SELECT * FROM ');
	}
    

}

/* End of file model_equations.php */
/* Location: ./application/controllers/model_equations.php */