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

    public function Insertar_Usuario() {
        $this->load->library('form_validation');
        $this->load->helper('recaptchalib');

        $error = array();
        $error['respuesta'] = 'false';

        $this->form_validation->set_rules('full_name', 'Password', 'required(' . $this->input->post('full_name') . ')');
        $this->form_validation->set_rules('user_name', 'Nombre', 'is_trim(' . $this->input->post('user_name') . ')|required(' . $this->input->post('user_name') . ')|alpha_numeric(' . $this->input->post('user_name') . ')|min_length(' . $this->input->post('user_name') . ',5)|max_length(' . $this->input->post('user_name') . ',15)');
        $this->form_validation->set_rules('apellido', 'Password', 'required(' . $this->input->post('apellido') . ')');
        $this->form_validation->set_rules('email', 'Email address', 'is_trim(' . $this->input->post('email') . ')|valid_email(' . $this->input->post('email') . ')|required(' . $this->input->post('email') . ')');
        $this->form_validation->set_rules('password', 'Month', 'required(' . $this->input->post('password') . ')|is_trim(' . $this->input->post('password') . ')');
        $this->form_validation->set_rules('month', 'Month', 'required(' . $this->input->post('month') . ')');
        $this->form_validation->set_rules('day', 'Month', 'required(' . $this->input->post('day') . ')');
        $this->form_validation->set_rules('gender', 'Gender', 'required(' . $this->input->post('gender') . ')');
        $this->form_validation->set_rules('year', 'Year', 'required(' . $this->input->post('year') . ')');
        $this->form_validation->set_rules('ciudades', 'Ciudad', 'required(' . $this->input->post('ciudades') . ')');

        $error['recaptcha']['response'] = 'true';

        $publickey = "6LfOv9ISAAAAAGm6FvkybaeYf2VzGJtrHfKjSkc6";
        recaptcha_get_html($publickey);

        $privatekey = "6LfOv9ISAAAAADibPaYhqX63VIsj774wv_J1rp6v";

        $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $this->input->post('recaptcha_challenge_field'), $this->input->post('recaptcha_response_field'));

        $arg = $this->form_validation->get_field_data();

        //Este for, me permite recorrer todos los metdos de validacion que se le definieron, e ir ejecutandolos uno a uno, cada metodo es marcado en un vector, con el fin de saber su valor de retorno.
        foreach ($arg as $key) {
            $function = explode('|', $key['rules']);
            foreach ($function as $val) {

                $f = explode('(', $val);
                $g = explode(')', $f[1]);
                //aca se ejecuta el metodo
                if (!$this->form_validation->{$f[0]}($g[0])) {

                    $error[$key['field']][$f[0]] = $this->form_validation->_messges_method_error[$f[0]];
                    continue;
                }
            }
            $vars = $this->input->post($key['field']);

            //echo $key['field'].':'.$this->form_validation->validate_tags_xss_clean($vars).'<br/>';
            if (!$this->form_validation->validate_tags_xss_clean($vars)) {
                $error[$key['field']]['validate_tags_xss_clean'] = $this->form_validation->_messges_method_error['validate_tags_xss_clean'];
            }
        }

        if (!$resp->is_valid) {
            $error['recaptcha']['recaptcha'] = "Los caracteres escritos no coinciden con la palabra de verificación. Inténtalo de nuevo.";
            $error['recaptcha']['response'] = 'false';
        }


        if (count($error) == 1) {
            $error['respuesta'] = 'true';
            $this->load->model('model_Usuario', 'usr');
            $this->usr->Insertar_Usuario();
        }
        echo json_encode($error);
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
}

?>
