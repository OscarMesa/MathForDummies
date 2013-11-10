<?php
$ext = array();
if($argv[1] == 'mp4')
	$ext = array('ogv','webm');
else if($argv[1] == 'ogg')
	$ext = array('mp4','webm');
else
	$ext = array('mp4','ogv');
echo shell_exec('ffmpeg -threads 2 -i /opt/lampp/htdocs/PoliAulaLink/upload/'.$argv[2].' -f webm /opt/lampp/htdocs/MathForDummies/upload/'.$argv[3].'.'.$ext[0].'; ffmpeg -threads 2 -i /opt/lampp/htdocs/MathForDummies/upload/'.$argv[2].' -f ogg /opt/lampp/htdocs/MathForDummies/upload/'.$argv[3].'.'.$ext[1]);
chmod('/opt/lampp/htdocs/PoliAulaLink/upload/'.$argv[3].'.'.$ext[0], 0777);
chmod('/opt/lampp/htdocs/PoliAulaLink/upload/'.$argv[3].'.'.$ext[1], 0777);