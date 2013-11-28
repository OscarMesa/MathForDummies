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

    /**
    *   Este metodo se encarga de validar un usuario.
    *   @author Oskar
    *   @return Boolean
    */
    public function ValidateUser() {
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
        $this->form_validation->set_rules('name', '"correo"', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', '"contraseña"', 'trim|required');
        if($this->form_validation->run() == false){
            $rpt['rpt'] = false;
        }else{
            $query = $this->muser->ValidarSesionUsuario($this->input->post('name'),$this->input->post('password'));
            if($query->num_rows()>0){
                $rpt['rpt'] = true;
                $query = $query->result_array();
                $this->session->set_userdata($query[0]);
            }else{
                $rpt['rpt'] = false;
            }
        }
       echo json_encode($rpt);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo json_encode(array('rpt'=>true));
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
        $rpt = array();

        if($this->ValidateDataUser() == false){
            $rpt['msg'] = validation_errors_array();
            $rpt['rpt'] = false;
        }else{  
            $result = $this->muser->getUserForEmail($this->input->post('EmailUser'));
            if($result->num_rows==0)
            {
                $this->muser->saveNewUrse(array($this->input->post('NameUser'),$this->input->post('LastName1'),
                                          $this->input->post('LastName2'),sha1($this->input->post('password')),
                                          $this->input->post('TephoneUser'),$this->input->post('CellUser'),
                                          $this->input->post('EmailUser'),$this->input->post('id_profesion'),
                                          $this->input->post('id_perfil')));
                $rpt['rpt'] = true;
            }else{
                $rpt['step_msg'] = array('EmailUser'=>'Este usuario ya se encuentra registrado');
                $rpt['rpt'] = false;
            }
        }   
        echo json_encode($rpt);
    }
    
    public function NewUserFast(){
        $rpt = array();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->form_validation->set_rules('nombre', '"correo"', 'trim|required');
        $this->form_validation->set_rules('correo', '"correo"', 'trim|required|valid_email');
        $this->form_validation->set_rules('perfil', '"perfil"', 'trim|required');
        
        if($this->form_validation->run() == false){
            $rpt['msg'] = validation_errors_array();
            $rpt['rpt'] = false;
        }else{  
            $result = $this->muser->getUserForEmail($this->input->post('correo'));
            if($result->num_rows==0)
            {
                $this->muser->saveNewUrseFast(array(
                                                    'state_usuario'=>'incomplete_register', 
                                                    'nombre'=>$this->input->post('nombre'),
                                                    'tipo_perfil'=>$this->input->post('perfil'),
                                                    'correo'=>$this->input->post('correo')
                                                ));
                $rpt['step_msg'] = "Usuario almacenado exitosamente";
                $rpt['rpt'] = true;
            }else{
                $rpt['step_msg'] = array('EmailUser'=>'Este usuario ya se encuentra registrado');
                $rpt['rpt'] = false;
            }
        }
        echo json_encode($rpt);
    }
    

    public function UpdateUser()
    {
       
        $rpt = array();

        if($this->ValidateDataUser() == false){
            $rpt['msg'] = validation_errors_array();
            $rpt['rpt'] = false;
        }else{
            $this->muser->saveUpdateUrse(array($this->input->post('NameUser'),$this->input->post('LastName1'),
                                      $this->input->post('LastName2'),sha1($this->input->post('password')),
                                      $this->input->post('TephoneUser'),$this->input->post('CellUser'),
                                      $this->input->post('EmailUser'),$this->input->post('id_profesion'),
                                      $this->input->post('id_perfil'),$this->input->post('id_user')));
            //echo $this->db->last_query();
            $rpt['rpt'] = true;
        }
        echo json_encode($rpt);
    }

    public function ValidateDataUser()
    {
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
        return $this->form_validation->run();
    }

    public function DeleteUrse()
    {
        echo json_encode(array('col_afetada' => $this->muser->delteUrse($this->input->post('id')))); 
    }

    public function SearchUsers()
    {
        if($this->input->post('valuesearch') != '')
           $data['users'] = $this->muser->SearchUser($this->input->post('valuesearch'));
        else
            $data['users'] = $this->muser->getAllUser();
       // echo $this->db->last_query();
        $data['table'] = 'usuarios';
        echo $this->load->view('SearchTable',$data);
    }
}

?>
