<?php

//Librerias y archivos importantes
date_default_timezone_set('America/Caracas');

require 'libs/globals_urls.php';
require 'libs/path.php';
require 'libs/iniciador.php';
require 'libs/includes.php';
require 'libs/regexp.php';

// ---------------------------------


//iniciamos / refrescamos la sesión, en caso de que exista
session_start();

//----------------------------------

//Constantes para conexiones a bases de datos
require 'modelos/config.php';

//Llamamos al iniciador de la aplicación, que fue requerido desde libs/

$app = new iniciador();
