<?php



// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

defined('MYSQL_HOST') or define('MYSQL_HOST','localhost');
defined('MYSQL_USER') or define('MYSQL_USER', 'root');
defined('MYSQL_PASS') or define('MYSQL_PASS','root');
defined('MYSQL_DB') or define('MYSQL_DB','math');
defined('MYSQL_PORT') or define('MYSQL_PORT','5432');

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',FALSE);
defined('ACTIVE') or define('ACTIVE',1);
defined('INACTIVE') or define('INACTIVE',2);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
 