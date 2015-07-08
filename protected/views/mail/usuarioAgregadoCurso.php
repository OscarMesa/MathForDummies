<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Usuario registrado a curso</title>

<!-- Hotmail ignora cierto código valido, se agrega esto -->
<style type="text/css">
.ReadMsgBody
{width: 100%; background-color: #FFFFFF;}
.ExternalClass
{width: 100%; background-color: #FFFFFF;}
body
{width: 100%; height: 100%; background-color: #FFFFFF; margin:0; padding:0; -webkit-font-smoothing: antialiased;}
html
{width: 100%; height: 100%;}

@media only screen and (max-device-width: 480px) {

.mobile_text_1 { font-size: 9px; color: #fff; text-align: right; }
.mobile_text_2 { font-size: 14px; color: #404040; text-align: left; font-weight:bold; }
.mobile_text_3 { font-size: 12px; color: #404040; text-align: left; }
.mobile_text_4 { font-size: 11px; color: #404040; text-align: left; }
.mobile_text_5 { font-size: 11px; color: #fff; text-align: center; line-height: 20px; }
.mobile_text_6 { font-size: 10px; color: #404040; text-align: left; line-height: 15px; }

}
</style>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<!-- Wrapper -->
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="100%" height="100%" valign="top">  

    <!-- Main wrapper --><table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
      <tr>
        <td>
        
          <!-- Iphone Wrapper -->
                    
                    <table width="660" border="0" cellpadding="0" cellspacing="0" align="center">
            <tr>
              <td width="30"></td>
              <td width="600" bgcolor="#DDDDDD">
        <!-- Top -->
                <table width="600" border="0" cellspacing="0" cellpadding="0">

  </table>
  <table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="600" bgcolor="#FFFFFF"><img src="http://www.nettic.com.co/boletines/tudiscotek/top.png" width="600" height="35" /></td>
  </tr>
  </table>
  <table width="580" align="center" height="40" border="0" cellspacing="0" cellpadding="0">
  <tr>
     <td width="193" height="40"><img src="http://gammarisk.com.co/oscar/iefo.png" alt="logo" /></td>
  </tr>
  </table>
  <table width="580" height="40" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="450"><p style="text-align:left; font-size: 15px; color: #000000; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif">
            <?php echo ucwords(Yii::app()->user->um->getFieldValueInstance($usuario->iduser,'nombrecompleto')->value); ?>, 
            tu vinculación al cursor <b><?php echo $curso->nombre_curso; ?></b> fue exitosa.<br/>
      </p></td>
    <td align="right">
    <table width="130"  align="center" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="130" height="28"><img src="http://png.findicons.com/files/icons/1575/web_injection/48/contact.png" width="41" height="33" /></td>
        </tr>
    </table></td>
  </tr>
</table>
  <table width="580" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
        <span style="text-align:center; font-size: 13px; color: #0A0A04; line-height:18px; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif">
              El curso se encuentran habilitado a partir de 
              <?php echo $curso->fecha_inicio ?>, su culminación será en el <?php echo $curso->fecha_cierre; ?>.
          
      </span>
    </td>
  </tr>
      <tr>
          <td>
              <b><?php echo $curso->nombre_curso; ?> contiene los siguientes temas:</b>
              <?php
                  echo "<table><ul>";
                  foreach ($curso->temas as $val) {
                      echo  "<tr><td> <li>".$val['titulo']."</li><td></tr>";
                  } 
                  echo "</ul></table>";
              ?>
              Cualquier sugerencia o inquietud se podrá comunicar con le profesor <b><?php echo ucwords(Yii::app()->user->um->getFieldValueInstance($curso->id_docente,'nombrecompleto')->value); ?></b>
          </td>
      </tr>    
      <tr>
          <td>
              <p><span>Diríjase al siguiente link para darle un vistazo al curso.</span></p> <br/>
              <a href="<?php echo Yii::app()->createAbsoluteUrl('cursos/index',array($curso->id)); ?>">Click aqui</a>
          </td>
      </tr>
</table>
    <table width="580" height="15" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td></td>
  </tr>
</table>
    <table width="600" border="0" align="center" bgcolor="#F2F2F2" cellpadding="0" cellspacing="5" id="separador">
      <tr>
    <td height="25" valign="middle" style="font-size: 16px; color: #000000; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif"><strong>¡OzAuLink!</strong></td>
  </tr>
</table>
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="600" bgcolor="#FFFFFF"><img src="http://www.nettic.com.co/boletines/tudiscotek/shadow-bottom.png" width="600" height="35" /></td>
  </tr>
  </table>



</td>
            <td width="30"></td>
          </tr>
        </table>
                    
                    
                    <!-- End Iphone Wrapper -->

    
        </td>
      </tr>
    </table><!-- End Main wrapper -->

    </td>
  </tr>
</table><!-- End Wrapper -->

<!-- Done -->

</body>
</html>