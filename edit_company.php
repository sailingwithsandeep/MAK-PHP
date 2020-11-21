<?php
require_once './includes/auth_validate.php';
require_once './config/config.php';


if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    $company_id = $_GET['id'];
    $get_company = mysqli_query($mysqli,"SELECT * FROM `company` WHERE id='$company_id'");
    $data = mysqli_fetch_array($get_company);
  
    
    if(mysqli_num_rows($get_company) === 1){
        
        $row = mysqli_fetch_assoc($get_company);
    



 include_once('includes/header.php'); ?>
        <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Company</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="company.php"><i class="fas fa-arrow-circle-left text-white-50"></i>&nbsp;Go Back</a></div>
                
                </div>
                <div class="row mb-3 ml-3">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Company Form</p>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="company_name"><strong>Update Company</strong></label><input class="form-control"  type="text" value="<?php echo $data[1]; ?>";placeholder="Company Name" name="company_name" ></div>
                                                </div>
                                                
                                            </div>
                                           
                                            <div class="form-group"><button class="btn btn-primary btn-sm" type="submit" name="add_company">Edit</button></div>
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
    header("Location:company.php");
       
    }

if(isset($_POST['company_name'])){
    
   
    if(!empty($_POST['company_name']) ){
        
        $company_name = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['company_name']));
       
            $company_id = $_GET['id'];
            
            $check_company = mysqli_query($mysqli, "SELECT `company_name` FROM `company` WHERE company_name = '$company_name' AND id != '$company_id'");
            
            if(mysqli_num_rows($check_company) > 0){    
                
                header("location:edit_company.php?err=1",true,  301);
            }else{
                
                      
                $update_query = mysqli_query($mysqli,"UPDATE `company` SET company_name='$company_name' WHERE id=$company_id");

                if($mysqli->query($update_query) === TRUE)
                {
                    header("Location:company.php");
                    exit;

                }else{
                    header("location:edit_company.php?err=1",true,  301);
                    exit;
                }
            }
        
        
    }else{
        header("location:edit_company.php?err=1");
    }   
}
include_once('includes/footer.php'); ?>
