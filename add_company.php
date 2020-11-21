<?php
require_once './config/config.php';
require_once './includes/auth_validate.php';
?>

<?php
if(isset($_POST['add_company'])){
    if( empty($_POST['company_name'])  )
    {
        header("location:add_company.php?err=1");
    }else{
        $company_name = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['company_name']));
        $company_id = $_GET['id'];
      
        $check_company = mysqli_query($mysqli, "SELECT `company_name` FROM `company` WHERE company_name = '$company_name' AND id != '$company_id'");
        if (mysqli_num_rows($check_company) > 0) {
            header("location:add_company.php?err=1");
        }
        else{
            $sql = "INSERT INTO company(company_name)
            VALUES('$company_name')";

            if( $mysqli->query($sql) === TRUE){
                header("Location: company.php");
            }else{
                header("location:add_company.php?err=1");
            }
        }
      
           
    }
}
?>

<?php include_once('includes/header.php'); ?>
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
                                                    <div class="form-group"><label for="company_name"><strong>Add Company</strong></label><input class="form-control" type="text" placeholder="Company Name" name="company_name"></div>
                                                </div>
                                                
                                            </div>
                                           
                                            <div class="form-group"><button class="btn btn-primary btn-sm" type="submit" name="add_company">Add</button></div>
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
