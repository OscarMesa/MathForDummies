<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Professions extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_professions','mprofessions');
    }

    public function LoadViewProfessions(){
    	$data['profession'] = $this->mprofessions->getAllProfessions();
    	$this->load->view('view_professions',$data);
    }

    public function LoadAutoComplete()
    {
    	$element = $this->mprofessions->LoadProfetionAutocomplete($this->input->post('value'));
    	echo json_encode($element);
    }

    public function SearchProfession()
    {
        $data['cursos'] = $this->cursos->SearchCurse($this->input->post('valuesearch'));
        $data['table'] = 'profesiones';
        echo $this->load->view('SearchTable',$data);
    }
}

/* End of file professions.php */
/* Location: ./application/controllers/professions.php */