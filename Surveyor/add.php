<?php
require_once './config/config.php';
require_once './includes/auth_validate.php';

if (isset($_POST['add_case'])) {
    if (empty($_POST['source_name']) && empty($_POST['company_name'])) {
        header("location:add.php?err=1");
        echo $sql;
       
    } else {
        $surveyor_name = $_SESSION['surveyor_name'];
        $source_name = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['source_name']));
        $company_name = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['company_name']));
        $location = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['location']));
        $vehicle_number = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['vehicle_number']));
        $vehicle_type = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['vehicle_type']));
        $issue_date = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['issue_date']));
       
        $km = $_POST['km'];
        $cash = $_POST['cash'];

        $case_id = $_GET['case_id'];
     
        $check_vehicle_number = mysqli_query($mysqli, "SELECT `vehicle_number` FROM `case_register` WHERE vehicle_number = '$vehicle_number' AND case_id != '$case_id'");
        
       
        
     
            
        if (mysqli_num_rows($check_vehicle_number) > 0) {
            header("location:add.php?err=1");
            echo $sql;
        } else {
            $sql = "INSERT INTO case_register(vehicle_number,location,type,km,cash,issue_date,company_id ,source_id ,surveyor_id)VALUES('$vehicle_number','$location','$vehicle_type','$km','$cash','$issue_date',(SELECT id FROM company WHERE company_name = '$company_name'),(SELECT id FROM source WHERE source_name = '$source_name'),(SELECT id FROM surveyor WHERE surveyor_name = '$surveyor_name'))";
           echo $sql;
           
            if ($mysqli->query($sql) === true) {
                header("Location:index.php");
            } else {
                header("location:add.php?err=1");
                echo $sql;
            }
        }
    }
}

?>