<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Oskar
 */
class model_usuario extends CI_Model {

    function __construct() {
        //$data = array('descripcion' => 'Manizales');
        //$str = $this->db->insert_string('mosterbook_ciudades', $data);
        // $str = $this->db->query($str);

        /* echo $this->load->helper('prueba');
          Hola(); */
        //$this->load->helper('url');
        /*
          echo site_url('index');
          echo base_url('url');
          echo current_url();
          echo uri_string();
          echo index_page();
          echo anchor('www.goolge.com', 'oscar mesa', 'medellin');
          $atts = array(
          'width'      => '800',
          'height'     => '600',
          'scrollbars' => 'yes',
          'status'     => 'yes',
          'resizable'  => 'yes',
          'screenx'    => '0',
          'screeny'    => '0'
          );

          echo anchor_popup('news/local/123', 'Click Me!', $atts);
          echo mailto('me@my-site.com', 'Click Here to Contact Me'); */


        //   $sql = "SELECT * FROM  mosterbook_ciudades WHERE id = ? AND descripcion=?"; 
        //   $query = $this->db->query($sql, array('1', 'Medellin')); 
    }

    /**
     * Description of idUsuario
     *
     * @author Czbloody
     * @param nombreUsuario Es el nombre de usuario por el cual se obtiene el id
     * 
     */
    public function idUsuario($nombreUsuario) {
        $query = $this->db->query('select id_usuario from mb_usuarios where usuario=? limit 1', array($nombreUsuario));

        if ($query->num_rows() > 0) {
            $fila = $query->result_array();
            return $fila[0]['id_usuario'];
        }else
            return null;
    }

    //Obtiene toda la info de usuario con
    public function obtenerInfoUsuario($idUsuario) {
        $query = $this->db->query('select * from mb_usuarios where id_usuario=? limit 1', array($idUsuario));

        if ($query->num_rows() > 0) {
            $user = $query->result_array();
            return $user[0];
        }else
            return null;
    }

    //Obtener universidades del usuario.
    public function obtenerUniversidades($idUsuario) {
        $query = $this->db->query('SELECT mb_profesiones.nombre_profesion, mb_universidad.nombre_universidad
									FROM  `mb_usuarios_profesiones` 
									JOIN mb_profesiones ON mb_profesiones.id_profesion = mb_usuarios_profesiones.id_profesion
									JOIN mb_universidad ON mb_universidad.id_universidad = mb_usuarios_profesiones.id_universidad
									WHERE id_usuario =?', array($idUsuario));

        if ($query->num_rows() > 0) {
            return $query;
        }else
            return null;
    }

    public function obtenerEmpleos($idUsuario) {
        $query = $this->db->query('SELECT mb_profesiones.nombre_profesion, mb_empleos.descripcion
					FROM  `mb_usuario_empleo` 
					JOIN mb_profesiones ON mb_profesiones.id_profesion = mb_usuario_empleo.id_profesion
					JOIN mb_empleos ON mb_empleos.id_empleo = mb_usuario_empleo.id_empleo
					WHERE id_usuario =?', array($idUsuario));

        if ($query->num_rows() > 0) {
            return $query;
        }else
            return null;
    }

    public function mod_ExistenciaData($sql, $arguments) {
        $query = $this->db->query($sql, array('1' => mysql_real_escape_string($arguments)));

        if ($query->num_rows() > 0)
            $array['res'] = 'true';
        else
            $array['res'] = 'false';
        return $array;
    }

    /**
     * Este metodo se encarga de insertar un usuaro nuevo
     *
     * @author Oskar
     * @param arg_usuario Le llegan todos los argumentos para insertar un usuarion por metodo post
     * 
     */
    public function Insertar_Usuario() {
        $salt = com_create_guid();
        $field_values = array(
            'nombre' => $this->input->post('full_name') . " " . $this->input->post('apellido'),
            'usuario' => $this->input->post('user_name'),
            'fecha_registro' => date("Y-m-d:H:i:s"),
            'fecha_ultacceso' => date("Y-m-d:H:i:s"),
            'activo' => 1,
            'password' => sha1(sha1($this->input->post('password')) . sha1($salt)),
            'salt' => $salt,
            'identificacion' => 0,
            'ciudad' => $this->input->post('ciudades'),
            'Genero' => $this->input->post('gender'),
            'tipo_id' => 1
        );
        $id = $this->db->insert_id();
        $this->db->insert('mb_usuarios', $field_values);
        $this->db->insert('mb_mail', array('id_usuario' => $id, 'mail' => $this->input->post('email')));
        $this->db->insert('mb_usuarios_perfiles', array('id_usuario' => $id, 'id_perfil' => 1));
    }

    public function Eliminar_Usuario($key) {
        $this->db->where('id_usuario', $key);
        $this->db->delete('mb_usuarios_perfiles');

        $this->db->where('id_usuario', $key);
        $this->db->delete('mb_mail');

        $this->db->where('id_usuario', $key);
        $this->db->delete('mb_usuarios');
    }

    /**
     * Este Metodo se encarga de validar el inicio de sesión de un usuario.
     * 
     * @author Oskar
     * @param mail_user Variable contiene el correo del usuario o su nombre de usuario, en caso que desee iniciar con el. 
     * @param password contiene el password ingresado por el usuario
     * @return true|false si el correo es valido devolvera true, en caso contraio retorna flase 
     */
    public function ValidarSesionUsuario($mail_user, $password) {
        $query = $this->db->query('SELECT mb_mail.mail, MbU.usuario, MbU.password, MbU.nombre, MbU.id_usuario, MbU.salt
                                   FROM mb_usuarios AS MbU
                                   JOIN mb_mail ON MbU.id_usuario = mb_mail.id_usuario
                                   WHERE mb_mail.mail = ? 
                                         OR MbU.usuario = ? LIMIT 0 , 30', array($mail_user, $mail_user));
        $data['validate']=FALSE;
        foreach ($query->result() as $row) {
            if ($row->password == sha1(sha1($password) . sha1($row->salt))) {
                $data['validate'] = TRUE;
                $data['elements'] = $query->result_array();
            }
                break;
        }
        return $data;
    }

}

?>
