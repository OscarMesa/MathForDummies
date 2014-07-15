<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
return array(
<<<<<<< HEAD
   'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
   'name' => 'PoliAuLink',
   'language' => "es",
   'defaultController' => 'usuarios/inicio',
   'theme' => 'PoliAuLink',
   // preloading 'log' component
    'preload'=>array(
           'bootstrap',
           'log',
       ),
   // autoloading model and component classes
   'import' => array(
       'application.models.*',
       'application.extensions.*',
       'application.models.appjoomla.*',
       'application.components.*',
       'ext.yii-mail.YiiMailMessage',
       'application.modules.cruge.components.*',
       'application.modules.cruge.extensions.crugemailer.*',
   //  'application.controllers.*',
   ),
   'preload' => array(
       'bootstrap',
       'log',
   ),
   'modules' => array(
       // uncomment the following to enable the Gii tool

       'gii' => array(
           'class' => 'system.gii.GiiModule',
           'password' => 'admin',
           // If removed, Gii defaults to localhost only. Edit carefully to taste.
           'ipFilters' => array('127.0.0.1', '::1'),
           'generatorPaths' => array(
               'bootstrap.gii',
           ),
       ),
       //Cruge, manejo de usuarios
       'cruge' => array(
           'userFilter' => 'application.components.MiFiltroUsuario',
           'tableprefix' => 'math_',
           // para que utilice a protected.modules.cruge.models.auth.CrugeAuthDefault.php
           //
// en vez de 'default' pon 'authdemo' para que utilice el demo de autenticacion alterna
           // para saber mas lee documentacion de la clase modules/cruge/models/auth/AlternateAuthDemo.php
           //
           'availableAuthMethods' => array('default'),
           'availableAuthModes' => array('username', 'email'), //En este caso el usuario podra iniciar o con el nombre de usuario o el email
           // url base para los links de activacion de cuenta de usuario
           'baseUrl' => 'http://localhost/PoliAuLink',
           // NO OLVIDES PONER EN FALSE TRAS INSTALAR
           'debug' => true,
           'rbacSetupEnabled' => true,
           'allowUserAlways' => false,
           // MIENTRAS INSTALAS..PONLO EN: false
           // lee mas abajo respecto a 'Encriptando las claves'
           //
'useEncryptedPassword' => false,
           // Algoritmo de la función hash que deseas usar
           // Los valores admitidos están en: http://www.php.net/manual/en/function.hash-algos.php
           'hash' => 'md5',
           // Estos tres atributos controlan la redirección del usuario. Solo serán son usados si no
           // hay un filtro de sesion definido (el componente MiSesionCruge), es mejor usar un filtro.
           //  lee en la wiki acerca de:
           //   "CONTROL AVANZADO DE SESIONES Y EVENTOS DE AUTENTICACION Y SESION"
           //
// ejemplo:
           // 'afterLoginUrl'=>array('/site/welcome'),  ( !!! no olvidar el slash inicial / )
           // 'afterLogoutUrl'=>array('/site/page','view'=>'about'),
           //
           'afterLoginUrl' => null,
           'afterLogoutUrl' => null,
           'afterSessionExpiredUrl' => array('/usuarios/inicio'),
           // manejo del layout con cruge.
           //
'loginLayout' => '//layouts/column2',
           'registrationLayout' => '//layouts/column2',
           'activateAccountLayout' => '//layouts/column2',
           //'editProfileLayout' => '//layouts/column2',
           // en la siguiente puedes especificar el valor "ui" o "column2" para que use el layout
           // de fabrica, es basico pero funcional.  si pones otro valor considera que cruge
           // requerirá de un portlet para desplegar un menu con las opciones de administrador.
           //
           'generalUserManagementLayout' => 'ui',
           // permite indicar un array con los nombres de campos personalizados,
           // incluyendo username y/o email para personalizar la respuesta de una consulta a:
           // $usuario->getUserDescription();
           'userDescriptionFieldsArray' => array('email'),
       ),
   ),
   // application components
   'components' => array(
       'log' => array(
           'session' => array(
               'timeout' => 60,
           ),
           'class' => 'CLogRouter',
           'routes' => array(
               /* array(
                 'class' => 'CWebLogRoute',
                 'categories' => 'system.db.CDbCommand',
                 'showInFireBug' => true,
                 ), */
               array(
                   'class' => 'CEmailLogRoute',
                   'levels' => 'error, warning',
                   'emails' => 'oscarmesa.elpoli@gmail.com',
               ),
           ),
       ),
       //User para cruge
       'user' => array(
           'allowAutoLogin' => true,
           'class' => 'application.modules.cruge.components.CrugeWebUser',
           'loginUrl' => array('/cruge/ui/login'),
       ),
       'bootstrap' => array(
           'class' => 'bootstrap.components.Bootstrap',
           'responsiveCss'=>true,
       ),
       // uncomment the following to enable URLs in path-format
       'urlManager' => array(
           'urlFormat' => 'path',
           'rules' => array(
               '<controller:\w+>/<id:\d+>' => '<controller>/view',
               '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
               '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
               'programa/subirArchivo/<id>' => 'programa/subirArchivo',
               'programa/ActualizaEstado/<programa>/<estado>' => 'programa/ActualizaEstado'
           ),
       ),
       'db' => array(
           'connectionString' => 'mysql:host=localhost;dbname=math;unix_socket:/path/to/socket/mysql.sock',
           'emulatePrepare' => true,
           'username' => 'root',
           'password' => '',
           'charset' => 'utf8',
           'tablePrefix' => '',
           'enableProfiling' => true,
       ),
       // uncomment the following to use a MySQL database
       /*
         'db'=>array(
         'connectionString' => 'mysql:host=localhost;dbname=testdrive',
         'emulatePrepare' => true,
         'username' => 'root',
         'password' => '',
         'charset' => 'utf8',
         ),
        */
       'errorHandler' => array(
           // use 'site/error' action to display errors
           'errorAction' => 'site/error',
       ),
       'log' => array(
           'class' => 'CLogRouter',
           'routes' => array(
               array(
                   'class' => 'CFileLogRoute',
                   //'levels' => 'error, warning',
                   'categories' => 'system.db.*',
                   'logFile' => 'sql.log',
               ),
           // uncomment the following to show log messages on web pages
           /*
             array(
             'class'=>'CWebLogRoute',
             ),
            */
           ),
       ),
       'authManager' => array(
           'class' => 'application.modules.cruge.components.CrugeAuthManager',
       ),
       'crugemailer' => array(
           'class' => 'application.components.MyCrugerMail',
           'mailfrom' => 'admin@documentacion.com',
           'subjectprefix' => 'Recupera tu contraseña.',
           'debug' => true,
       ),
       'mail' => array(
           'class' => 'ext.yii-mail.YiiMail',
           'transportType' => 'smtp',
           'transportOptions' => array(
               'host' => 'smtp.gmail.com',
               'username' => 'poliaulink@gmail.com',
               'password' => 'politecnico',
               'port' => '465',
               'encryption'=>'ssl',
           ),
           'viewPath' => 'application.views.mail',
           'logging' => true,
           'dryRun' => false
       ),
   ),
   // application-level parameters that can be accessed
   // using Yii::app()->params['paramName']
   'params' => array(
       // this is used in contact page
       'adminEmail' => 'info@aerovision.com.co',
   ),
=======
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'PoliAuLink',
    'language' => "es",
    'defaultController' => 'usuarios/inicio',
    'theme' => 'PoliAuLink',
    // preloading 'log' component
    	'preload'=>array(
            'bootstrap',
            'log',
        ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.extensions.*',
        'application.models.appjoomla.*',
        'application.components.*',
        'ext.yii-mail.YiiMailMessage',
        'application.modules.cruge.components.*',
        'application.modules.cruge.extensions.crugemailer.*',
    //  'application.controllers.*',
    ),
    'preload' => array(
        'bootstrap',
        'log',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'bootstrap.gii',
            ),
        ),
        //Cruge, manejo de usuarios
        'cruge' => array(
            'userFilter' => 'application.components.MiFiltroUsuario',
            'tableprefix' => 'math_',
            // para que utilice a protected.modules.cruge.models.auth.CrugeAuthDefault.php
            //
			// en vez de 'default' pon 'authdemo' para que utilice el demo de autenticacion alterna
            // para saber mas lee documentacion de la clase modules/cruge/models/auth/AlternateAuthDemo.php
            //
			'availableAuthMethods' => array('default'),
            'availableAuthModes' => array('username', 'email'), //En este caso el usuario podra iniciar o con el nombre de usuario o el email
            // url base para los links de activacion de cuenta de usuario
            'baseUrl' => 'http://localhost/PoliAuLink',
            // NO OLVIDES PONER EN FALSE TRAS INSTALAR
            'debug' => true,
            'rbacSetupEnabled' => true,
            'allowUserAlways' => false,
            // MIENTRAS INSTALAS..PONLO EN: false
            // lee mas abajo respecto a 'Encriptando las claves'
            //
			'useEncryptedPassword' => false,
            // Algoritmo de la función hash que deseas usar
            // Los valores admitidos están en: http://www.php.net/manual/en/function.hash-algos.php
            'hash' => 'md5',
            // Estos tres atributos controlan la redirección del usuario. Solo serán son usados si no
            // hay un filtro de sesion definido (el componente MiSesionCruge), es mejor usar un filtro.
            //  lee en la wiki acerca de:
            //   "CONTROL AVANZADO DE SESIONES Y EVENTOS DE AUTENTICACION Y SESION"
            //
			// ejemplo:
            //		'afterLoginUrl'=>array('/site/welcome'),  ( !!! no olvidar el slash inicial / )
            //		'afterLogoutUrl'=>array('/site/page','view'=>'about'),
            //
			'afterLoginUrl' => null,
            'afterLogoutUrl' => null,
            'afterSessionExpiredUrl' => null,
            // manejo del layout con cruge.
            //
			'loginLayout' => '//layouts/column2',
            'registrationLayout' => '//layouts/column2',
            'activateAccountLayout' => '//layouts/column2',
            //'editProfileLayout' => '//layouts/column2',
            // en la siguiente puedes especificar el valor "ui" o "column2" para que use el layout
            // de fabrica, es basico pero funcional.  si pones otro valor considera que cruge
            // requerirá de un portlet para desplegar un menu con las opciones de administrador.
            //
			'generalUserManagementLayout' => 'ui',
            // permite indicar un array con los nombres de campos personalizados, 
            // incluyendo username y/o email para personalizar la respuesta de una consulta a: 
            // $usuario->getUserDescription(); 
            'userDescriptionFieldsArray' => array('email'),
        ),
    ),
    // application components
    'components' => array(
        'log' => array(
            'session' => array(
                'timeout' => 60,
            ),
            'class' => 'CLogRouter',
            'routes' => array(
                /* array(
                  'class' => 'CWebLogRoute',
                  'categories' => 'system.db.CDbCommand',
                  'showInFireBug' => true,
                  ), */
                array(
                    'class' => 'CEmailLogRoute',
                    'levels' => 'error, warning',
                    'emails' => 'oscarmesa.elpoli@gmail.com',
                ),
            ),
        ),
        //User para cruge
        'user' => array(
            'allowAutoLogin' => true,
            'class' => 'application.modules.cruge.components.CrugeWebUser',
            'loginUrl' => array('/cruge/ui/login'),
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
            'responsiveCss'=>true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'programa/subirArchivo/<id>' => 'programa/subirArchivo',
                'programa/ActualizaEstado/<programa>/<estado>' => 'programa/ActualizaEstado'
            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=math;unix_socket:/path/to/socket/mysql.sock',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'tablePrefix' => '',
            'enableProfiling' => true,
        ),
        // uncomment the following to use a MySQL database
        /*
          'db'=>array(
          'connectionString' => 'mysql:host=localhost;dbname=testdrive',
          'emulatePrepare' => true,
          'username' => 'root',
          'password' => '',
          'charset' => 'utf8',
          ),
         */
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    //'levels' => 'error, warning',
                    'categories' => 'system.db.*',
                    'logFile' => 'sql.log',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
        'authManager' => array(
            'class' => 'application.modules.cruge.components.CrugeAuthManager',
        ),
        'crugemailer' => array(
            'class' => 'application.components.MyCrugerMail',
            'mailfrom' => 'admin@documentacion.com',
            'subjectprefix' => 'Recupera tu contraseña.',
            'debug' => true,
        ),
        'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'transportType' => 'smtp',
            'transportOptions' => array(
                'host' => 'aerovision.com.co',
                'username' => 'info@aerovision.com.co',
                'password' => 'aerovision',
                'port' => '25',
            ),
            'viewPath' => 'application.views.mail',
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'info@aerovision.com.co',
    ),
>>>>>>> 05bd9bba5603cb648a1a70d0dcaa99a441d0ad06
);