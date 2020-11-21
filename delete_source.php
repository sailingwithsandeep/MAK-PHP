<?php
require_once './config/config.php';
require_once './includes/auth_validate.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    $source_id = $_GET['id'];
    $delete_company = mysqli_query($mysqli,"DELETE FROM `source` WHERE id='$source_id'");
    
    if($delete_company){
        header("Location: source.php");
        exit;

    }else{
        header("location:source.php?err=1");

    }
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}
?>