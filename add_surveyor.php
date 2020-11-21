<?php
require_once './config/config.php';
require_once './includes/auth_validate.php';
?>

<?php
if(isset($_POST['add_surveyor'])){
    if( empty($_POST['surveyor_name']) && empty($_POST['email']) && empty($_POST['password'])  )
    {
        header("location:add_surveyor.php?err=1");
    }else{

        $surveyor_name = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['surveyor_name']));
        $email = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['email']));
        $password = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['password']));
        $surveyor_id = $_GET['id'];
      if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $check_surveyor = mysqli_query($mysqli, "SELECT `surveyor_name` FROM `surveyor` WHERE surveyor_name = '$surveyor_name' AND id != '$surveyor_id'");
        $check_email = mysqli_query($conn, "SELECT `email` FROM `surveyor` WHERE email = '$email' AND id != '$surveyor_id'");
            
        if (mysqli_num_rows($check_surveyor) > 0 && mysqli_num_rows($check_email) > 0 ) {
            header("location:add_surveyor.php?err=1");
        }
        else{
            $sql = "INSERT INTO surveyor(surveyor_name,email,password)
            VALUES('$surveyor_name','$email','$password')";

            if( $mysqli->query($sql) === TRUE){
                header("Location: surveyor.php");
            }else{
                header("location:add_surveyor.php?err=1");
            }
        }
      }
       
      
           
    }
}

?>

<?php include_once('includes/header.php'); ?>
        <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Surveyor</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="surveyor.php"><i class="fas fa-arrow-circle-left text-white-50"></i>&nbsp;Go Back</a></div>
                
                </div>
    
                
                <div class="row mb-3 ml-3">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Surveyor Form</p>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="surveyor_name"><strong>Add Surveyor</strong></label><input class="form-control" type="text" placeholder="Surveyor Name" name="surveyor_name" required></div>
                                                    <div class="form-group"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required ></div>
                                                    <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password" required></div>
                                                </div>
                                                
                                            </div>
                                           
                                            <div class="form-group"><button class="btn btn-primary btn-sm" type="submit" name="add_surveyor">Add</button></div>
                                        </form>
                                        <br>
                                        <?php 
                                        if(isset($_REQUEST["err"]))
                                            $msg="Fill the required fields or  Error while insertion";
                                        ?>
                                        <p style="color:red;">
                                        <?php if(isset($msg))
                                        {
                                            
                                        echo $msg;
                                        }
                                        ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
                        <?php include_once('includes/footer.php'); ?>
