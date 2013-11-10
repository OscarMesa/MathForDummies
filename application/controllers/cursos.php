<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cursos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_cursos','cursos');
	}

    public function index()
    {
        
    }

    public function LoadViewCursos(){
    	$data['cursos'] = $this->cursos->getAllcursos();
    	$this->load->view('view_cursos',$data);  
    }

    public function NewCurso(){
        $this->cursos->NewCurso(array('',''));
        echo json_encode(array('id_new_curso' => $this->db->insert_id()));

    }

    public function DeleteCurso(){
        echo json_encode(array("col_afetada"=>$this->cursos->DeleteCurso($this->input->post('id'))));
    }

    public function LoadAllCursesFilter()
    {
        $name_curse = $this->input->post('value');
        $this->load->model('Model_type_curse','mtypecurse');
        $curses = $this->mtypecurse->mtypecurse->getCurses($name_curse);
        echo json_encode($curses);
    }
}

/* End of file cursos.php */
/* Location: ./application/controllers/cursos.php */