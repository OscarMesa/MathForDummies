<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//$config['protocol'] = 'exim4';
//$config['mailpath'] = '/usr/sbin/exim4';
//$config['charset'] = 'UTF-8';
//$config['wordwrap'] = TRUE;

$config['protocol'] = 'smtp'; 
$config['smtp_host'] = 'ssl://smtp.googlemail.com'; 
$config['smtp_port'] = 465; 
$config['smtp_user'] = 'poliauliink@gmail.com'; 
$config['smtp_pass'] = 'politecnico'; 
$config['smtp_timeout'] = '7'; 
$config['charset'] = 'UTF-8'; 
$config['newline'] = "\r\n"; 
$config['mailtype'] = 'text'; // or html 
$config['validation'] = TRUE; // bool whether to validate email or not ?>