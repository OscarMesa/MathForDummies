<?php

/*
 * Este modelo permite generar las operaciones con todas las ciudades.
 * and open the template in the editor.
 */

/**
 * Description of model_ciudades
 *
 * @author Oskar
 */
class model_ciudades extends CI_Model{
        
        public function __construct() {
            
        }
        
        public function mod_getCiudades(){
            $this->db->select('*');
            $this->db->from('mb_ciudades');

            $query = $this->db->get();
            
            return $query->result_array();
        }
}

?>
