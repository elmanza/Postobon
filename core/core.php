<?php 
date_default_timezone_set('America/Bogota');
// NUCLEO DE LA APLICACION
session_start();
// app
define('HTML_DIR','public/');
define('FRONT_DIR','views/front/');
define('LOGIN_DIR','views/login/');
define('DASH_DIR','views/dashboard/');
define('TITTLE_APP','Tienda Cercana Postobón');
define('URL_APP','http://localhost/postobon_final/');


// base de datos
define('CONF_DB_HOST','localhost');
define('CONF_DB_USER','root');
define('CONF_DB_PASS','');
define('CONF_DB_DATABASE','postobon');
define('CONF_DB_CHARSET','utf8');

require('core/models/class.Conexion.php');

?>