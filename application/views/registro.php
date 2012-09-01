<div style="margin:auto;width:90%">
  
    <div style="float:right;width:55%">
      <div class="user_register_form" >

            <div class="user_register_title">Regístrate
                <div class="extra_info">Es fácil, rápido y recibirás muchos beneficios.</div>
            </div>

            <?php $attributes = array('id' => 'formulario');
            echo form_open('', $attributes); ?>

            <table id="registro_tabla">
                <tr>
                    <td><label><span class="required">*</span>Nombre:</label></td>
                    <td><?php echo form_input(array('id' => 'full_name', 'name' => 'full_name'));
            echo form_error('full_name', 'id="jsdfjsdf"', 'id="errorr"'); ?><span id="errormsg_full_name" class="errormsg" role="alert"></span></td>
                </tr>

                <tr>
                    <td><label><span class="required">*</span>Apellido:</label></td>
                    <td><?php echo form_input(array('id' => 'apellido', 'name' => 'apellido'));
                        echo form_error('apellido'); ?><sqpan id="errormsg_apellido" class="errormsg" role="alert"></span></td>
                    </tr>
                    <tr>
                        <td> <label><span class="required">*</span>Correo:</label></td>
                        <td><?php echo form_input(array('id' => 'email', 'type' => 'email', 'name' => 'email', 'rel' => '0,0', 'class' => 'required email comprueba'));
                echo form_error('email'); ?><span id="errormsg_email" class="errormsg" role="alert"></span></span></td>
                    </tr>
                    <tr>
                        <td><label><span class="required">*</span>Nombre de usuario:</label></td>
                        <td><?php echo form_input(array('id' => 'user_name', 'name' => 'user_name', 'size' => '30', 'rel' => "1,2", 'class' => 'required usuario comprueba'));
                            echo form_error('user_name'); ?><span id="errormsg_user_name" class="errormsg" role="alert"></span></td>
                    </tr>
                    <tr>
                        <td><label><span class="required">*</span>Contraseña:</label></td>
                        <td><?php echo form_input(array('id' => 'password', 'name' => 'password', 'type' => 'password', 'size' => '30', 'class' => 'required'));
                            echo form_error('password'); ?><span id="errormsg_password" class="errormsg" role="alert"></span></td>

                    </tr>
                    <tr>
                        <td><label><span class="required">*</span>Fecha de nacimiento:</label><br/></td>
                        <td><?php echo form_dropdown('month', array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'), array(3), 'id="month" class="js_datepicker_month required"');
                            echo form_error('month'); ?>

                            <span class="required"></span>/</label>
                            <?php
                            $dias = array();
                            for ($i = 1; $i <= 31; $i++)
                                $dias[$i] = $i;
                            echo form_dropdown('day', $dias, array(3), 'id="day" name="day" class="js_datepicker_month required"');
                            echo form_error('day');
                            ?>

                            <span class="required"></span>/</label>
                            <?php
                            $year = array();
                            $yearmax = date("Y") - 18;
                            $yearmin = date("Y") - 100;
                            for ($i = $yearmax; $i >= $yearmin; $i--)
                                $year[$i] = $i;
                            echo form_dropdown('year', $year, array(3), 'id="year" name="year" class="js_datepicker_month required"');
                            echo form_error('year') . "<br/>";
                            ?> <span id="errormsg_password" class="errormsg" role="alert"></span><span id="errormsg_date" class="errormsg" role="alert"></span><span id="errormsg_password" class="errormsg" role="alert"></span></td>
                    </tr>
                    <tr>
                        <td><label><span class="required">*</span>Ciudad:</label></td>
                        <td>
                            <select name="ciudades" id="ciudades" name="ciudades" class="js_datepicker_month required">
                                <?php
                                $arrayciudades = array();
                                foreach ($ciudades as $clave => $valor) {
                                    echo '<option value="' . $valor['id_ciudad'] . '">' . $valor['descripcion'] . '</option>';
                                }
                                echo form_error('ciudades');
                                ?>
                            </select><span id="errormsg_gender" class="errormsg" role="alert"></span><span id="errormsg_ciudades" class="errormsg" role="alert"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label><span class="required">*</span>Género:</label></td>
                        <td><?php echo form_dropdown('gender', array('Masculino', 'Femenino'), array(3), 'id="gender" class="required"');
                                echo form_error('gender') . '<br/><br/>'; ?><span id="errormsg_gender" class="errormsg" role="alert"></span><span id="errormsg_gender" class="errormsg" role="alert"></span></td>
                    </tr>

                    <tr>
                        <td colspan="2">


                            <div id="divrecaptcha" style="display:none;">  


                                <div id="controls" class="controls">
                                    <a href="javascript:Recaptcha.reload()" id="recaptcha_reload_button" ></a> <br />
                                    <a href="javascript:Recaptcha.switch_type('audio')" id="recaptcha_audio_button" class="recaptcha_only_if_image"></a> 
                                    <a href="javascript:Recaptcha.switch_type('image')" id="recaptcha_image_button" class="recaptcha_only_if_audio"></a><br />  
                                    <a href="javascript:Recaptcha.showhelp()" id="recaptcha_help_button" ></a>  
                                </div>  

                                <div id="recaptcha_image"></div>
                                <div class="recaptcha_only_if_incorrect_sol" style="color:red">Incorrect please try again</div>
                                <p> <span class="recaptcha_only_if_image">Escriba el texto</span><br />
                                    <span class="recaptcha_only_if_audio">Escriba el sonido</span> 
                                    <input type="text" class="required" name="recaptcha_response_field" id="recaptcha_response_field"  /><!--Important-->  
                                </p>  

                            </div> 


                            <script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6LfOv9ISAAAAAGm6FvkybaeYf2VzGJtrHfKjSkc6">
                            </script>
                            <noscript>
                            <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LfOv9ISAAAAAGm6FvkybaeYf2VzGJtrHfKjSkc6"
                                    height="300" width="500" frameborder="0"></iframe><br>
                            <textarea name="recaptcha_challenge_field" rows="3" cols="40">
                            </textarea>
                            <input type="hidden" name="recaptcha_response_field"
                                   value="manual_challenge">
                            </noscript>



                            <span id="errormsg_recaptcha" class="errormsg" role="alert"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo form_submit('Registrar', 'Registrarse', 'id="js_registration_submit" class="button_register"');
                            echo form_error('js_registration_submit'); ?>

                        </td>
                    </tr>   
            </table>
            <?php echo form_close(); ?>
            <div id="res"></div>

        </div>
    </div>
    <div style="float:left;width:45%">
       
    </div>
  <div class="clear"></div>
</div>
