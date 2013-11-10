<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_university extends CI_Model {

	public function __construct(){
		parent::__construct();
	}    
	public function getAllUniversities(){
		$query = $this->db->query("SELECT * FROM universidad LIMIT 10");
		return $query->result_array();
	}
}

/* End of file model_university.php */
/* Location: ./application/controllers/model_university.php */