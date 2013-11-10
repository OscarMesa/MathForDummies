<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_profesores extends CI_Model {

    public function __construct(){
    	parent::__construct();
    }

    public function getAllTeacherFilter($value)
    {
        $query = $this->db->query("SELECT id_usuario,nombre,apellido1,apellido2 FROM usuarios WHERE tipo_perfil = 2 AND nombre LIKE '%".$value."%'");
        return $query->result_array();
    }

}

/* End of file model_profesores.php */
/* Location: ./application/controllers/model_profesores.php */