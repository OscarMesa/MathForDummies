<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_cursos extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function getAllcursos(){
		$query = $this->db->query('SELECT cu.*,u.nombre docente,tp.nombre curso FROM cursos cu INNER JOIN tipo_curso tp ON tp.id_tipo_curso = cu.id_tipo_curso
							INNER JOIN usuarios u ON cu.id_docente = u.id_usuario AND cu.state_curso="active" AND u.tipo_perfil = "2"');
		return $query->result_array();
	}    
	public function saveNewCurse($arra_save){
		return $this->db->query('INSERT INTO cursos(id_tipo_curso,id_docente) VALUES(?,?)',array($arra_save['id_typecurse'],$arra_save['id_teacher']));
	}
	public function delteCurse($id){
		return $this->db->query('UPDATE cursos SET state_curso="inactive" WHERE id = ?',array($id));
	}
	public function EditCurse($array_edit){
		return $this->db->query('UPDATE cursos SET id_tipo_curso = ?, id_docente = ? WHERE id = ?',array($array_edit['id_typecurse'],$array_edit['id_teacher'],$array_edit['id']));
	}
	public function SearchCurse($SearchValue){
		$query = $this->db->query('SELECT cu.*,u.nombre docente,tp.nombre curso FROM cursos cu 
									INNER JOIN tipo_curso tp ON tp.id_tipo_curso = cu.id_tipo_curso
									INNER JOIN usuarios u ON cu.id_docente = u.id_usuario 
									AND cu.state_curso="active" AND u.tipo_perfil = "2" AND (cu.id LIKE "%'.$SearchValue.'%" OR tp.nombre LIKE "%'.$SearchValue.'%" OR u.nombre LIKE "%'.$SearchValue.'%")');
		return $query->result_array();
	}

	public function getCursesAvailableToTechear($data_array)
	{
		$query = $this->db->query('SELECT cu.*,tp.nombre nombre_curso FROM cursos cu 
									INNER JOIN tipo_curso tp ON tp.id_tipo_curso = cu.id_tipo_curso
									INNER JOIN usuarios u ON cu.id_docente = u.id_usuario 
									AND cu.state_curso="active" AND u.correo=? AND u.tipo_perfil="2"',$data_array);
		return $query->result_array();
			
	}

	public function getCursesAvailableToStudent($data_array)
	{
		$query = $this->db->query('SELECT c.*,tp.nombre nombre_curso FROM integrantes_curso ic 
									INNER JOIN usuarios u ON ic.id_integrante = u.id_usuario
									INNER JOIN curso c ON c.id = ic.cursos_id
									INNER JOIN tipo_curso tp ON c.id_tipo_curso = tp.id_tipo_curso
									WHERE AND c.state_curso="active" AND u.correo=? AND u.tipo_perfil="1"',$data_array);
		return $query->result_array();
	}

}

/* End of file model_cursos.php */
/* Location: ./application/controllers/model_cursos.php */