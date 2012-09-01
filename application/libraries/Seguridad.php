<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seguridad {

    private $seguridad;
    private $accespublic;
    private $domidb;
    private $acceso;
    private $seguadmin;

    public function __construct() {
        $this->accespublic = 1;
        $this->domidb = 3;
        $this->seguridad = "mosterbook";
        $this->acceso = 3;
    }

    public function getSeguridad() {
        return $this->seguridad;
    }

    public function getAccespublic() {
        return $this->accespublic;
    }

    public function getDomindb() {
        return $this->domidb;
    }

    public function getAcceso() {
        return $this->acceso;
    }

    public function setAcceso($acceso=0) {
        $this->acceso = $acceso;
    }

    public function setSeguridad($seguridad=0) {
        $this->seguridad = $seguridad;
    }

    public function setAccespublic($accespublic="") {
        $this->accespublic = $accespublic;
    }



    public function filtrado2($valor) {
        $nopermitidos = array("'", "'", '\\', '<', '>', "\"", ";");
        $valor = str_replace($nopermitidos, "", $valor);
        return $valor;
    }

    public function crear_cookies($valorr) {
        if (!isset($_SESSION)) {
            session_start();
        }

        setCookie('mosterbook', $valorr, time() + 3600 * 0.50);
        $_SESSION['mosterbook'] = time();
        $_SESSION['mosterbook_s'] = md5(date("d/m/Y") . $valorr);
    }

    public function eliminar_cookies($valorr) {
        if (!isset($_SESSION)) {
            session_start();
            session_destroy();
        } else {
            session_destroy();
        }
        setCookie('mosterbook', $valorr, time() - 3600 * 0.50);
    }

    public function IniciarUsuarios($contrase, $usuario) {
        $time2 = date("d/m/Y");
        $contrase = md5($contrase) . md5($contrase);

        $cmd = $this->db->prepare("SELECT * FROM " . $this->domidb . "_usuarios where usuario = ? and contrase = ?", array($usuario, $contrase));

        $cmd->execute();

        $result = $cmd->fetchAll();

        if ($rows = $cmd->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            $cmd = $this->db->prepare("UPDATE " . $this->domidb . "_usuarios set fecha_ultacceso = ? where id = ?", array($time2, $rows['id']));

            $this->acceso = $rows['tipo_usuario'];
            $vall = $this->acceso . "," . $rows['id'];

            $this->crear_cookies($vall);

            if ($rows['tipo_usuario'] == -1) {
                $this->seguadmin = 1;
                Header('Location: index.php?pag=access&item=articulo');
            } else {
                Header('Location: index.php');
            }
        } else {
            //acceso =1 si los datos incorrectos
            $this->acceso = -2;
        }
    }

    public function ValidarAcceso() {
        if (md5(date("d/m/Y") . $_COOKIE['mosterbook']) == $_SESSION['mosterbook_s']) {
            $valor = explode(',', $_COOKIE['mosterbook']);
            $valores = $valor;
            $acceso = $valores[0];
            $id_usuario = $valores[1];
            $cmd = $this->db->prepare("SELECT * FROM " . $domidb . "_usuarios where id='" . $id_usuario . "'");

            if ($rows = $cmd->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                $usuario = $rows['usuario'];
            }
            $vali = 1;
        } else {
            eliminar_cookies($acceso);
            Header('Location: index.php');
        }
    }

    public function convertir($str) {
        if (!isset($GLOBALS["carateres_latinos"])) {
            $todas = get_html_translation_table(HTML_ENTITIES, ENT_NOQUOTES);
            $etiquetas = get_html_translation_table(HTML_SPECIALCHARS, ENT_NOQUOTES);
            $GLOBALS["carateres_latinos"] = array_diff($todas, $etiquetas);
        }
        $str = strtr($str, $GLOBALS["carateres_latinos"]);
        return $str;
    }
    
    
    public function ValidarCorreo()
    {
        $this->load->model();
        if(mysql_num_rows(mysql_query("select email from moster_user where email='".mysql_real_escape_string($dato)."' limit 1",$conexion))==1)
            $res["res"]=1;
	else
            $res["res"]=0;
    }

}

?>