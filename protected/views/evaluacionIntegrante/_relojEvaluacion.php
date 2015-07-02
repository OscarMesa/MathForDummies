<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->getBaseUrl() . "/css/reloj/main.css");
Yii::app()->clientScript->registerScriptFile(Yii::app()->getBaseUrl() . "/js/reloj/jquery.lwtCountdown-1.0.js", CClientScript::POS_END);
//Yii::app()->clientScript->registerScriptFile(Yii::app()->getBaseUrl() . "/js/reloj/main.js", CClientScript::POS_END);
?>	

<div class="row" style="text-align:right">
    <div class="col-lg-8 col-lg-offset-2" style="margin-top: 30px;">
        <div style="display: inline-block;vertical-align: top;  margin-top: -16px;"><h3 style="color: #6f6f6f;">Tiempo restante:</h3></div>
        <div class="" style="display: inline-block;">        
            <ul id="countdown_dashboard">
                <li class="dash hours_dash">
                    <span class="dash_title">Horas</span>
                    <div class="digit">0</div>
                    <div class="digit">0</div>
                </li>
                <li class="dash minutes_dash">
                    <span class="dash_title">Minutos</span>
                    <div class="digit">0</div>
                    <div class="digit">0</div>
                </li>

                <li class="dash seconds_dash">
                    <span class="dash_title">Segundos</span>
                    <div class="digit">0</div>
                    <div class="digit">0</div>
                </li>
            </ul>
        </div>
    </div>
</div>