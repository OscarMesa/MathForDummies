<?php

/**
* 
*/
class Model_video extends CI_Model
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


}