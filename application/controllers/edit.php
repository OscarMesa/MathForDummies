<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	* Esta calse realiza operaciones contra la base de datos, las cuales son muy generalizadas.
	*
	* @author Oskar
	*/

	class Edit extends CI_Controller {
		
		private $fields;
	    
	    public function __construct()
	    {
	    	parent::__construct();
	    	$this->load->library('session');
	    	$this->load->model('model_edit','edit');

	    	$this->fields = array(sha1('nombre') => array('nombre','nombre','trim|required'),
	    						  sha1('descripcion') => array('descripcion','descripción','trim|required'),
	    		 				  sha1('tipo_curso') => array('tipo_curso'));
	    	$this->load->helper('form');
	    	$this->load->library('form_validation');
	    }
	    /**
	    * Este metodo modifica un campo de una tabla en la base de datos.
	    *
	    * @author Oskar
	    * @param save en esta cadena cuenta con la llave primaria, el campo a modidficar y la tabla. Este se almacena en el vector data.
	    * @param data[0] en este campo se guarda la llave primaria del registro a modificar
	    * @param data[1] en este campo se guarda el campo a modificar.
	    * @param data[2] en este campo se guarda la tabla a modificar.
	    * @param value este campo traee el nuevo valor a modificar.
	    * @return int Cantidad de registros modificados.
	    * 
	    */
		public function Update(){
			if(strstr($this->input->post('table'),'-no_save')) {
				$return['message'] = $this->input->post('value');
				$return['rpt'] = true;
				exit(json_encode($return));
			}
			$data = explode(':',$this->input->post('table'));
			//print_r($data);
			$this->form_validation->set_rules('value',
			 $this->fields[$data[1]][1], 
			 $this->fields[$data[1]][2]);
			$return['rpt'] = true;
			if ($this->form_validation->run() == FALSE){
				$return['error'] = validation_errors_array();
				$return['rpt'] = false;
			}else{
				$this->edit->ModifyField($this->fields[ $data[1]][0], 
														  $this->fields[$data[2]][0],$this->input->post('value'),$data[0]);
				$return['rpt'] = true;
			}
			$return['message'] = $this->input->post('value');
			echo json_encode($return);
		}


		public function GetUrlNetwork(){
				echo json_encode($this->edit->GetUrlNetwork($this->input->post("company_id"),$this->input->post("which")));
		}

		public function eMaps(){
			$this->load->view("maps");
		}

}	
	/* End of file edit.php */
	/* Location: ./application/controllers/edit.php */
?>