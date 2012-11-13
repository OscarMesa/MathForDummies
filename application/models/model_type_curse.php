<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_type_curse extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
    /**
    *	Este metodo extraee los datos de la base de datos
    *	@author Oskar
    */
    public function getAllTypeCurse(){
    	$query = $this->db->query('SELECT * FROM tipo_curso LIMIT 10');
    	return $query->result_array();
    }

}

/* End of file model_type_curse.php */
/* Location: ./application/controllers/model_type_curse.php */