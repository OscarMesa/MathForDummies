<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_cursos extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getAllcursos(){
		$query = $this->db->query('SELECT cu.*,u.nombre docente,tp.nombre curso FROM cursos cu INNER JOIN tipo_curso tp ON tp.id_tipo_curso = cu.id_tipo_curso
							INNER JOIN usuarios u ON cu.id_docente = u.id_usuario AND u.tipo_perfil = "2"');
		return $query->result_array();
	}    

	public function DeleteCurso($id){
		return $this->db->query('DELETE FROM tipo_curso WHERE id=?',array($id));
	}

	public function NewCurso($elementos){
		return $this->db->query('INSERT INTO tipo_curso(nombre,descripcion) VALUES(?,?)',$elementos);
	}

	public function saveNewCurse($arra_save){
		return $this->db->query('INSERT INTO cursos(id_tipo_curso,id_docente) VALUES(?,?)',array($arra_save['id_typecurse'],$arra_save['id_teacher']));
	}

}

/* End of file model_cursos.php */
/* Location: ./application/controllers/model_cursos.php */