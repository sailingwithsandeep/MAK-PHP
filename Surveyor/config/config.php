<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
define('BASE_PATH', dirname(dirname(__FILE__)));
define('APP_FOLDER', 'mak');
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));



$mysqli = new mysqli("localhost","root","","mak");

if(!$mysqli)
{
	echo "Database connection failed...";
}

?>
