<?php
	
	function timeSocial($fecha){	
		$fechaPublicacionTime = strtotime($fecha);
		$fechaActual=getdate();
		$fechaPublicacion=getdate($fechaPublicacionTime);
		
		$expresion['year']['plural']='años';
		$expresion['year']['singular']='año';
		$expresion['mon']['plural']='meses';
		$expresion['mon']['singular']='mes';
		$expresion['mday']['plural']='días';
		$expresion['mday']['singular']='día';
		$expresion['hours']['plural']='horas';
		$expresion['hours']['singular']='hora';
		$expresion['minutes']['plural']='minutos';
		$expresion['minutes']['singular']='minuto';
		$expresion['seconds']['plural']='segundos';
		$expresion['seconds']['singular']='segundo';
		
		$fechaActualOrd['year']=$fechaActual['year'];
		$fechaPublicacionOrd['year']=$fechaPublicacion['year'];
		$fechaActualOrd['mon']=$fechaActual['mon'];
		$fechaPublicacionOrd['mon']=$fechaPublicacion['mon'];
		$fechaActualOrd['mday']=$fechaActual['mday'];
		$fechaPublicacionOrd['mday']=$fechaPublicacion['mday'];
		$fechaActualOrd['hours']=$fechaActual['hours'];
		$fechaPublicacionOrd['hours']=$fechaPublicacion['hours'];
		$fechaActualOrd['minutes']=$fechaActual['minutes'];
		$fechaPublicacionOrd['minutes']=$fechaPublicacion['minutes'];
		$fechaActualOrd['seconds']=$fechaActual['seconds'];
		$fechaPublicacionOrd['seconds']=$fechaPublicacion['seconds'];
		
		$diferencia='0';
		$expresionTiempo='segundos';
		foreach($fechaActualOrd as $key=>$value){
			if($value>$fechaPublicacionOrd[$key]){
				$diferencia=$value-$fechaPublicacionOrd[$key];
				if($diferencia>1)
				$expresionTiempo=$expresion[$key]['plural'];
				elseif($diferencia==1)
				$expresionTiempo=$expresion[$key]['singular'];
				break;
			}
		}
		
		return 'Hace '.$diferencia.' '.$expresionTiempo;
	}