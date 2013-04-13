<?php

/**
* 
*/
class Model_videos extends CI_Model
{
	public function __construct()
	{

	}
	/**
	*	Este metodo se encarga de realizar una insercion
	*	@author Oskar.
	*/
	public function insert_video($array_data)
	{	
		$r = $this->db->query('INSERT INTO img_videos(url,nombre,type,descripcion) VALUES(?,?,?,?)',$array_data);
		return $r;
	}

	/**
	*	Este metodo se encarga de cargar todos los videos almacenados en la base de datos.
	*	@author oskar
	*/
	public function getAllVideos()
	{
		$result = $this->db->query("SELECT * FROM img_videos WHERE type = 'video' AND state_img_videos != 'inactive'");
		return $result;
	}

	/**
	*	Este metodo se encarga de retornar los videos donde encuente cualquier coincidencia en la 
	*
	*/
	public function SearchVideo($filter)
	{
		$query = $this->db->query('SELECT * FROM img_videos 
                           			WHERE type = "video" AND state_img_videos != "inactive" AND id LIKE "%'.$filter.'%" OR url LIKE "%'.$filter.'%" OR nombre LIKE "%'.$filter.'%" OR descripcion LIKE "%'.$filter.'%"');   
        return $query->result_array();
	}

}