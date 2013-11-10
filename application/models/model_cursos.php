<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_cursos extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getAllcursos(){
		$query = $this->db->query('SELECT * FROM tipo_curso');
		return $query->result_array();
	}    

	public function DeleteCurso($id){
		return $this->db->query('DELETE FROM tipo_curso WHERE id=?',array($id));
	}

	public function NewCurso($elementos){
		return $this->db->query('INSERT INTO tipo_curso(nombre,descripcion) VALUES(?,?)',$elementos);
	}

}

/* End of file model_cursos.php */
/* Location: ./application/controllers/model_cursos.php */