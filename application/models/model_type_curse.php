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

    /**
    *   Este metodo se encarga de extraeer los datos de la base de datos que concuerden con un parametro que se le envia.
    *   @author Oskar
    *   @return
    */
    public function getCurses($filter){
        $query = $this->db->query('SELECT * FROM tipo_curso WHERE nombre LIKE "%'.$filter.'%"');
        return $query->result_array();
    }

    public function DeleteCurso($id){
        return $this->db->query('DELETE FROM tipo_curso WHERE id=?',array($id));
    }

    public function NewCurso($elementos){
        return $this->db->query('INSERT INTO tipo_curso(nombre,descripcion) VALUES(?,?)',$elementos);
    }    
}

/* End of file model_type_curse.php */
/* Location: ./application/controllers/model_type_curse.php */