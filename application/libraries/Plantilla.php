<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of plantilla
 *
 * @author Oskar
 */
class Plantilla extends CI_Loader{
    
    public function Render($body,$datos=array(),$menu=false){
        parent::__construct();
        $this->view('theme/header',$datos);
		if($menu)
			$this->view('perfil/menu');
        $this->view($body,$datos);
        $this->view('theme/footer');       
    }
}

?>
