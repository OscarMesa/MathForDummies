<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_professions extends CI_Model {

    public function __construct(){
    	parent::__construct();
    }

    public function getAllProfessions(){
    	$query = $this->db->query('SELECT * FROM Profesion LIMIT 10');
    	return $query->result_array();
    }

    public function LoadProfetionAutocomplete($filter){
    	$query = $this->db->query("SELECT * FROM Profesion WHERE descripcion LIKE '%".$filter."%'");
    	return $query->result_array();
    }

}

/* End of file model_professions.php */
/* Location: ./application/controllers/model_professions.php */