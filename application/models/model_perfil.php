<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_perfil extends CI_Model {

	public function __construct(){
		parent::__construct();
	}    

	public function getAllProfile(){
		$query = $this->db->query("SELECT * FROM perfiles");
		return $query->result_array();
	}

	public function getProfileFilter($filter)
	{
		$query = $this->db->query('SELECT id_perfil id, nombre FROM perfiles WHERE nombre LIKE "%'.$filter.'%"');
		return $query->result_array();
	}

}

/* End of file model_perfil.php */
/* Location: ./application/controllers/model_perfil.php */