<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_edit extends CI_Model {

	public function __construct(){
	}

	public function ModifyField($field, $table,$value,$value_key){
		return $this->db->query('UPDATE '.$table.' SET '.$field.' = "'.$value.'" WHERE '.$table.'_id = '.$value_key);
	}
	public function GetUrlNetwork($id,$which)
	{
		$this->db->where("companies_id",$id);
		$q = $this->db->get("companies");
		if ( $q->num_rows() > 0 )
		{
			$social = $q->result();
			switch ($which) {
				case 'facebook':
					return $social[0]->companies_facebook;
					break;
				case 'twitter':
					return $social[0]->companies_twitter;
					break;
				case 'gogopoint':
					return $social[0]->companies_gogopoint;
					break;
			}
		} else {
			return false;
		}

	}

}
?>