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

    public function __construct() {
        parent::__construct();
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

    /**
    *
    *
    */
    public function getUserForEmail($email)
    {
       $query = $this->db->query('SELECT id_usuario FROM usuarios WHERE correo=? LIMIT 1', array($email));
       return $query;
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
    * Este metodo elimina a un usuario mediante su ID
    * @author Oskar
    * @return Number Numero de registros afectados.
    */
    public function DeleteUser($id) {

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
        $query = $this->db->query('SELECT * FROM usuarios WHERE correo=? AND contrasena=SHA1(?) LIMIT 1', array($mail_user,$password));
        return $query;
    }
    public function ValidarRegistro($nombre, $correo, $perfil) {
		$r = $this->db->insert("usuarios",array("correo"=>$correo,"contrasena"=>SHA1($contrasena),""))
       // $query = $this->db->query('SELECT * FROM usuarios WHERE correo=? AND contrasena=SHA1(?) LIMIT 1', array($mail_user,$password));
        return $query;
    }
    /**
    *   Este metodo retorna a todos los usuarios con su perfil y su profesion
    *   @author Oskar
    *   @return array
    */
    public function getAllUser(){
        $query = $this->db->query('SELECT u.*, prf.id_perfil,prf.nombre perfil_name, p.id_profesion, p.descripcion profesion_name FROM usuarios u 
                            INNER JOIN perfiles prf ON prf.id_perfil = u.tipo_perfil
                            INNER JOIN Profesion p ON p.id_profesion = u.id_profesion
                            WHERE u.state_usuario = "active"');
        return $query->result_array();
    }
    /**
     * Este metodo se encarga de insertar un usuaro nuevo
     *
     * @author Oskar
     * @param arg_usuario Le llegan todos los argumentos para insertar un usuarion por metodo post
     * 
     */
    public function saveNewUrse($array_elements) {
       return $this->db->query("INSERT INTO usuarios(nombre,apellido1,apellido2,contrasena,telefono,celular,correo,id_profesion,tipo_perfil) VALUES(?,?,?,?,?,?,?,?,?)",$array_elements); 
    } 

    public function saveUpdateUrse($array_elements){
        return $this->db->query("UPDATE usuarios SET nombre=?,apellido1=?,apellido2=?,contrasena=?,telefono=?,celular=?,correo=?,id_profesion=?,tipo_perfil=? WHERE id_usuario =?",$array_elements);
    }  

    public function delteUrse($id){
        return $this->db->query("UPDATE usuarios SET state_usuario = 'inactive' WHERE id_usuario = ?", array($id));
    } 

    public function SearchUser($filter)
    {
        $query = $this->db->query('SELECT u.*, prf.id_perfil,prf.nombre perfil_name, p.id_profesion, p.descripcion profesion_name FROM usuarios u INNER JOIN perfiles prf ON prf.id_perfil = u.tipo_perfil
                           INNER JOIN Profesion p ON p.id_profesion = u.id_profesion 
                           WHERE u.state_usuario = "active" AND u.nombre LIKE "%'.$filter.'%" OR u.apellido1 LIKE "%'.$filter.'%" OR u.apellido2 LIKE "%'.$filter.'%" OR u.telefono LIKE "%'.$filter.'%" OR u.celular LIKE "%'.$filter.'%" OR u.correo LIKE "%'.$filter.'%" OR prf.nombre LIKE "%'.$filter.'%" OR p.descripcion LIKE "%'.$filter.'%" GROUP BY u.id_usuario');   
        return $query->result_array();
    }

}

?>
