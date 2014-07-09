<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Datos de cuenta</title>

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


            p {
                color: #68737F;
                margin-bottom: -14px;
                font-size: 14px;
                font-family: 'Times New Roman';
                font-weight: bold;
            }
            .titulos{
                color: #7B507B;
                margin-right: 3px;
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
                                        <td width="600" bgcolor="">
                                            <!-- Top -->
                                            <table width="600" border="0" cellspacing="0" cellpadding="0">
                                            </table>
                                            <table width="600" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="600" bgcolor=""><img src="<?php echo Yii::app()->getBaseUrl(true) ?>/images/mail/head-mail.png" width="" height="" style="" /></td>
                                                </tr>
                                            </table>
                                            <table width="580" style="" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="193"><p style="color: #7B507B; font-weight: bold; font-size: 18px;"><?php
                                                            $nombre = CrugeFieldValue::model()->find('iduser=? AND idfield=1', array($model->iduser));
                                                            $genero = CrugeFieldValue::model()->find('iduser=? AND idfield=2', array($model->iduser));
                                                            if(count($genero)>0)
                                                                echo ucwords(($genero->value == 1 ? 'señor' : 'señora') . ' ' . $nombre->value);
                                                            ?></p>
                                                        <p>Las credenciales de su cuenta son:</p>
                                                    </td>
                                                </tr>
                                            </table>

                                            <table style="margin-top: 34px;" width="580" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="400">
                                                        <div><p><b class="titulos">Usuario:</b> <?php echo $model->username; ?></p> <p><b class="titulos">E-mail: </b><?php echo $model->email; ?></p> <p><b class="titulos">Contraseña: </b><?php echo $password; ?></p></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="180">
                                                        <p style="margin-top: 50px"> Por favor tome las precauciones necesarias para guardar su nueva clave</p>
                                                    </td>
                                                </tr>
                                                <tr><td>
                                                        <p style="color: #7B507B;font-weight: bold;text-align: center;margin-top: 20px">¡Gestion de documentos!</p>
                                                    </td></tr>
                                            </table>
                                            <table width="580" height="15" align="center" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td></td>
                                                </tr>
                                            </table>
                                            <table width="600" border="0" align="center" bgcolor="#F2F2F2" cellpadding="0" cellspacing="5" id="separador">
                                                <tr>

                                                </tr>
                                            </table>
                                            <table width="600" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="600" bgcolor="#FFFFFF"><img src="<?php echo Yii::app()->getBaseUrl(true) ?>/images/mail/linea-inf-mail.png" width="" height="" /></td>
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