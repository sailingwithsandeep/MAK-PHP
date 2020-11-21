<?php


require_once './config/config.php';
require_once './includes/auth_validate.php';

    $sql = "SELECT * FROM case_register";
    $result = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($result);

    $company = "SELECT * FROM company";
    $rc = mysqli_query($mysqli,$company);
    $countC = mysqli_num_rows($rc);

    $surveyor = "SELECT * FROM surveyor";
    $rsu = mysqli_query($mysqli,$surveyor);
    $countSu = mysqli_num_rows($rsu);

    $source = "SELECT * FROM source";
    $rs = mysqli_query($mysqli,$source);
    $countSo = mysqli_num_rows($rs);
    

 

?>
<!doctype html>
<html lang="en">


<?php include_once('includes/header.php'); ?>

<body id="page-top">
    <div id="wrapper">
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="add_case.php"><i class="fa fa-plus fa-sm text-white-50"></i>&nbsp;Add Case</a></div>
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Total Cases</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span> <?php echo $count;?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fa fa-shopping-cart  fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Surveyors</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $countSu;?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fa fa-money-bill-alt  text-success fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-info py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Companies</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $countC;?></span></div>
                                        
                                    </div>
                                    <div class="col-auto"><i class="fa fa-users  text-info fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-warning py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>Sources</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $countSo;?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fa fa-chart-line fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
</body>
<?php include_once('includes/footer.php'); ?>

</html>



