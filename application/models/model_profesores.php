<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_profesores extends CI_Model {

    public function __construct(){
    	parent::__construct();
    }

    public function AllTechers(){
    	$query = $this->db->query("SELECT id_usuario,nombre,apellido1,apellido2 FROM usuarios WHERE tipo_perfil = 2 AND nombre LIKE '%?%'",array($nombre));
    	echo "<pre>";
    	print_r($query);
    	echo "</pre>";

    	return $query;
    }

}

/* End of file model_profesores.php */
/* Location: ./application/controllers/model_profesores.php */