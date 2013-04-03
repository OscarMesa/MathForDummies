<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_excercices extends CI_Model {

	public function __construct()
	{

	}    

	public function getAllExcerices()
	{
		$query = $this->db->query('SELECT * FROM ejercicios');
		return $query->result_array();
	}
}

/* End of file model_excercices.php */
/* Location: ./application/controllers/model_excercices.php */