<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Oskar
 */
class usuario extends CI_Controller {

    private $mensajes_error;

    public function __construct() {
        parent::__construct();
        $this->load->model('model_usuario','muser');
    }

    public function index() {
        parent::__construct();
    }

    public function process1() {
        $name = trim($this->input->post('apellido'));
        $array = array('resultado' => $name);
        echo json_encode($array);
    }

    public function ValidarUsuario() {
        $user = trim($this->input->post('user'));
        $password = trim($this->input->post('pass'));
        $this->load->model('model_usuario', 'usr');
    }

    public function Existencia_Mail_User() {
        $table = trim($this->input->post('table'));
        $field = trim($this->input->post('field'));
        $dato = trim($this->input->post('dato'));
        $tbl = array('mail', 'usuarios', 'usuario');
        $this->load->model('model_usuario', 'usr');
        echo json_encode($this->usr->mod_ExistenciaData("SELECT $tbl[$field] FROM mb_$tbl[$table] WHERE $tbl[$field]=? limit 1", $dato));
    }

    public function EliminarUsuario($key) {
        $this->load->model('model_Usuario', 'usr');
        $this->usr->Eliminar_Usuario($key);
        echo "se elimino";
    }

    public function com_create_guid1() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
    /**
    * Este metodo inicia la sesion de un usuario    
    *
    * @author Oskar
    * @param login-field esta contiene el nombre de usuario o el correo.
    * @param password-field esta contiene el password con el cual el usuario desea iniciar session
    * @return TRUE | FALSE si el usuario es verdedero y corresponde su password retorna TRUE, en caso contrario devuelve FALSE 
    */
    public function IniciarSesionUsuario() {

    }
    
    /**
    * Este metodo finaliza la sesion del usuario que tenga la sesion abierta
    *
    * @author Oskar
    */
    public function TerminarSesion(){
        $this->session->sess_destroy();
    }

    /**
    *   Este metodo llama la vista que se encarga de listar todos los usaurios
    *   @author Oskar
    *   @return View La vista con todos los usuarios en el sistema.
    */
    public function LoadViewUsers(){
        $data['users'] = $this->muser->getAllUser();
        $this->load->view('view_usuarios',$data);
    }



    public function NewUser(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->form_validation->set_rules('NameUser', "nombre", 'trim|required');
        $this->form_validation->set_rules('LastName1', "Apellido", 'trim|required');
        $this->form_validation->set_rules('TephoneUser', "teléfono", 'trim|required|numeric');
        $this->form_validation->set_rules('CellUser', "celular", 'trim|required|numeric');
        $this->form_validation->set_rules('EmailUser', "correo", 'trim|required|valid_email');
        $this->form_validation->set_rules('id_profesion', "profesión", 'trim|required|numeric');
        $this->form_validation->set_rules('id_perfil', "perfil", 'trim|required|numeric');
        $this->form_validation->set_rules('password', "contraseña", 'trim|required|matches[cpassword]');
        $this->form_validation->set_rules('cpassword', "confirmar contraseña", 'trim|required');
        $rpt = array();

        if($this->form_validation->run() == false){
            $rpt['msg'] = validation_errors_array();
            $rpt['rpt'] = false;
        }else{
            $this->muser->saveNewUrse(array($this->input->post('NameUser'),$this->input->post('LastName1'),
                                      $this->input->post('LastName2'),sha1($this->input->post('password')),
                                      $this->input->post('TephoneUser'),$this->input->post('CellUser'),
                                      $this->input->post('EmailUser'),$this->input->post('id_profesion'),
                                      $this->input->post('id_perfil')));
            $rpt['rpt'] = true;
        }
        echo json_encode($rpt);
    }

    public function EditUser()
    {

    }
}

?>
