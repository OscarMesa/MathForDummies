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
class model_Publicaciones extends CI_Model{
   
    function __construct() {
      
    }
	
	function obtenerPublicaciones($idUsuario,$vista=1,$tipoPublicacion=false){
		$datos=array($idUsuario,$idUsuario);
		if($vista==1)
		{
			$sqlw='WHERE mb_publicaciones.id_usuario =? and mb_usuarios.id_usuario=mb_publicaciones.id_usuario';
		}
		elseif($vista==2)
		{
			$sqlw='JOIN mb_seguidores ON mb_seguidores.id_usuario = mb_publicaciones.id_usuario JOIN mb_usuarios ON mb_usuarios.id_usuario = mb_publicaciones.id_usuario';
		}
		$data=$this->db->query('SELECT 
									mb_publicaciones.nota, mb_publicaciones.fecha,
									mb_usuarios.nombre
								FROM '.(($vista!=2)?'mb_usuarios,':'').' mb_publicaciones
								'.$sqlw.' order by mb_publicaciones.fecha desc
								LIMIT 10',$datos);				
		return $data;
	}
	
	function obtenerMensajes($idUsuario){
		
		
		$data=$this->db->query('SELECT * FROM mb_usuarios,mb_mensajes,mb_fotos_perfil where mb_mensajes.id_usuario_enviar='.$idUsuario.' and  mb_mensajes.id_usuario_envio=mb_usuarios.id_usuario and mb_usuarios.fotouser=mb_fotos_perfil.id_foto_perfil order by mb_mensajes.fecha desc
								LIMIT 10');				
		return $data;
	}
	
}

?> 