<?php
require_once './config/config.php';

session_start();
session_destroy();
if(isset($_SESSION['surveyor_name']) && ($_SESSION['surveyor_id'])){
    unset($_SESSION['surveyor_name']);
    unset($_SESSION['surveyor_id']);
    header("Location: login.php");
}

exit;

?>