<?php
require_once './config/config.php';
require_once './includes/auth_validate.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    $surveyor_id = $_GET['id'];
    $delete_surveyor = mysqli_query($mysqli,"DELETE FROM `surveyor` WHERE id='$surveyor_id'");
    
    if($delete_surveyor){
        header("Location: surveyor.php");

    }else{
        header("location:surveyor.php?err=1");

    }
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}
?>