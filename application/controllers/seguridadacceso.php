<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of seguridadAcceso
 *
 * @author diego
 */
class seguridadacceso extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('form_validation');
    }

    public function index() {
        
    }

    public function iniciar_sesion() {
        if ($this->session->userdata('correo')) {
            redirect('/index');
        } else {
            $this->load->view('view_iniciar_sesion');
        }
    }

    public function recuperar() {
        $respuesta = array('rpt' => false, 'mensaje' => 'Error');
        $this->load->library('email', '', 'correo');
        $this->load->model('model_usuario', 'musuarios');
        $usuario = $this->musuarios->getUsuario($this->input->post("email"));

        if (isset($usuario[0]->nombre)) {
            $respuesta['rpt'] = true;
            $respuesta['mensaje'] = 'Se ha enviado un mensaje a el correo ' . $usuario[0]->correo . ', en este encontrara un link para realizar el cambió.';
            $this->correo->from('oscarmesa.elpoli@gmail.com', 'PoliAuLink');
            $this->correo->to($this->input->post("email"));
            $this->correo->set_mailtype("html");

            $message = '<html><head><meta http-equiv="content-type" content="text/html; charset=UTF-8" /></head><body>';
            $message .= '<img src="http://www.freeimagehosting.net/newuploads/5lgtl.png" alt="PoliAuLink" />';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10" border="0">';
            $message .= "<tr style='background: #eee;'><td><strong>Nombre:</strong> </td><td>" . ucwords(strip_tags($usuario[0]->nombre . " " . $usuario[0]->apellido1)) . "</td></tr>";
            $message .= "<tr><td><strong>Correo:</strong> </td><td>" . strip_tags($usuario[0]->correo) . "</td></tr>";
            $message .= "<tr><td><strong>Perfil:</strong> </td><td>" . ucwords(strip_tags($usuario[0]->nombre_perfil)) . "</td></tr>";
            $message .= "<tr><td colspan='2'>En este link podrá restraura la contraseña y habilitar nuevamente su perfil.</td></tr>";
            $message .= "<tr><td><strong>Link:</strong> </td><td><a href='" . base_url() . "SeguridadAcceso/recuperarCntr/" . $usuario[0]->contrasena . "/" . $usuario[0]->correo . "'>Recuperar contraseña</a></td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";

            $this->correo->subject('Recuperar contraseña');
            $this->correo->message($message);

            $this->correo->send();
        } else {
            $respuesta['mensaje'] = 'El correo no existe, porfavor verifiquelo';
        }
        echo json_encode($respuesta);
    }

    public function recuperarCntr($anteMD5, $mail) {

        echo $this->input->post("recuperar");
    }

    public function registrar() {
        $this->load->helper(array('form'));
        $this->load->model('model_usuario', 'musuarios');
        $this->form_validation->set_rules('nombre', '"correo"', 'trim|required');
        $this->form_validation->set_rules('correo', '"correo"', 'trim|required|valid_email');
        $this->form_validation->set_rules('perfil', '"perfil"', 'trim|required');
        if ($this->form_validation->run() == false) {
            $rpt['rpt'] = false;
        } else {
            $query = $this->musuarios->ValidarRegistro($this->input->post("nombre"), $this->input->post("correo"), $this->input->post("perfil"));
            if ($query > 0) {
                $rpt['rpt'] = true;
            } else {
                $rpt['rpt'] = false;
            }
        }
        echo json_encode($rpt);
    }

}

?>
