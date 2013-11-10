<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_contens','mcontent');
    }

    public function LoadViewTypeContents(){
    	$data['TypeContent'] = $this->mcontent->getAllTypeContens();
    	$this->load->view('view_TypeContent',$data);
    }

}

/* End of file contents.php */
/* Location: ./application/controllers/contents.php */