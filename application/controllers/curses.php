<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curses extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_type_curse','tcurses');
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

}

/* End of file curses.php */
/* Location: ./application/controllers/curses.php */