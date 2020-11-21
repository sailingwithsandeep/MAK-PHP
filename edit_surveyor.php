<?php
require_once './includes/auth_validate.php';
require_once './config/config.php';
  
        
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    $surveyor_id = $_GET['id'];
    $get_surveyor = mysqli_query($mysqli,"SELECT * FROM `surveyor` WHERE id='$surveyor_id'");
    $data = mysqli_fetch_array($get_surveyor);
  
    
    if(mysqli_num_rows($get_surveyor) === 1){
        
        $row = mysqli_fetch_assoc($get_surveyor);
    



 include_once('includes/header.php'); ?>
        <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Surveyors</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="surveyor.php"><i class="fas fa-arrow-circle-left text-white-50"></i>&nbsp;Go Back</a></div>
                
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
                                                    <div class="form-group"><label for="surveyor_name"><strong>Add Surveyor</strong></label><input class="form-control" type="text" value="<?php echo $data[1]; ?>" placeholder="Surveyor Name" name="surveyor_name" required></div>
                                                    <div class="form-group"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $data[2]; ?>" placeholder="Enter Email Address..." name="email" required ></div>
                                                    <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" value="<?php echo $data[3]; ?>" name="password" required></div>
                                                </div>
                                                
                                            </div>
                                           
                                            <div class="form-group"><button class="btn btn-primary btn-sm" type="submit" name="add_surveyor">Edit</button></div>
                                        </form>
                                        <br>
                                        <?php 
                                        if(isset($_REQUEST["err"]))
                                            $msg="Fill the required fields or  Error while updating";
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
<?php
    }
    else {
      echo "Duplicate entry or invalid";
    }
}
else {
    header("Location:surveyor.php");
    
 }



if(isset($_POST['surveyor_name']) && isset($_POST['email']) && isset($_POST['password'])  ){
    
   
    if(!empty($_POST['surveyor_name']) && !empty($_POST['surveyor_name']) && !empty($_POST['surveyor_name']) ){
        
        $surveyor_name = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['surveyor_name']));
        $email = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['email']));
        $password = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['password']));
       
            $surveyor_id = $_GET['id'];
            
            $check_surveyor = mysqli_query($mysqli, "SELECT `surveyor_name` FROM `surveyor` WHERE surveyor_name = '$surveyor_name' AND id != '$surveyor_id'");
            $check_email = mysqli_query($conn, "SELECT `email` FROM `surveyor` WHERE email = '$email' AND id != '$surveyor_id'");
            
            if(mysqli_num_rows($check_surveyor) > 0 && mysqli_num_rows($check_email) > 0 ){    
                
                header("location:edit_surveyor.php?err=1");
            }else{
                
                      
                $update_query = mysqli_query($mysqli,"UPDATE `surveyor` SET surveyor_name='$surveyor_name',email='$email',password='$password' WHERE id=$surveyor_id");

                if($mysqli->query($update_query) === TRUE)
                {
                    header("Location:surveyor.php");
                    exit;

                }else{
                    header("location:edit_surveyor.php?err=1",true,  301);
                    exit;
                }
            }
        
        
    }else{
        header("location:edit_surveyor.php?err=1");

    }   
}
include_once('includes/footer.php'); ?>
