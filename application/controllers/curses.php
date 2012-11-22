<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curses extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_type_curse','tcurses');
        $this->load->model('Model_cursos', 'cursos');
    }
    /**
    *	Este metodo retorna todos tipos de cuersos con los cuales cuenta la plataforma
    *	@author Oskar
    *	@return View
    */
    public function LoadViewTypeCourse(){
    	$data['typecurses'] = $this->tcurses->getAllTypeCurse();
    	$this->load->view('view_type_courses',$data);
    }

    public function LoadDataTypeCurce(){
        echo json_encode($this->tcurses->getCurses($this->input->post('filter')));
    }


    /**
    *   Este metodo se encarga de realizar la logica de negocio de un nuevo curso
    *   @author Oskar
    *   @return array
    */
    public function NewCurse()
    {
        $rpt = array();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_teacher', '"profesor"', 'trim|required|numeric');
        $this->form_validation->set_rules('id_typecurse', '"tipo de curso"', 'trim|required|numeric');

        if($this->form_validation->run() == false){
            $rpt['msg'] = validation_errors_array();
            $rpt['rpt'] = false;
        }else{
            $this->cursos->saveNewCurse($_POST);
            $rpt['rpt'] = true;
        }
        echo json_encode($rpt);
    }
}

/* End of file curses.php */
/* Location: ./application/controllers/curses.php */