<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_contens extends CI_Model {

	public function __construct(){
		parent::__construct();
	}    

	public function getAllTypeContens(){
		$query = $this->db->query('SELECT * FROM tipo_contenido');
		return $query->result_array();
	}

}

/* End of file model_contens.php */
/* Location: ./application/controllers/model_contens.php */