<?php


session_start();

if (!isset($_SESSION['surveyor_name'])) {
	header('Location:login.php');
}

 ?>