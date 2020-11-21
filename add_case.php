<?php
require_once './config/config.php';
require_once './includes/auth_validate.php';

?>



<?php include_once('includes/header.php'); ?>
        <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Case Register</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="case.php"><i class="fas fa-arrow-circle-left text-white-50"></i>&nbsp;Go Back</a></div>
                
                </div>
    
                
                <div class="row mb-3 ml-3">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col">
                            <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Case Form</p>
                                    </div>
                                    <div class="card-body">
                                        <form action="add.php" method="POST">
                                            <div class="form-row">
                                                <div class="col">
                                              
                                            <div class="form-group"><label for="surveyor_name"><strong>Surveyor</strong></label>  <select class="mdb-select md-form form-control" type="text" placeholder="Select Surveyor " name="surveyor_name" required>
                                            <?php
                                                $res = mysqli_query($mysqli, "SELECT * FROM surveyor");
                                                while($row = mysqli_fetch_array($res)) {
                                                    echo("<option value='".$row['surveyor_name']."'>".$row['surveyor_name']."</option>");
                                                }
                                                ?>
                                               
                                                </select></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="source"><strong>Source</strong></label> <select class="mdb-select md-form form-control" type="text" placeholder="Select Source" name="source_name" required>
                                            <?php
                                                $res = mysqli_query($mysqli, "SELECT * FROM source");
                                                while($row = mysqli_fetch_array($res)) {
                                                    echo("<option value='".$row['source_name']."'>".$row['source_name']."</option>");
                                                }
                                                ?>
                                               
                                                </select></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="company"><strong>Company</strong></label>
                                                    <select class="mdb-select md-form form-control"type="text" placeholder="Select Company" name="company_name" required>
                                                <?php
                                                $res = mysqli_query($mysqli, "SELECT * FROM company");
                                                while($row = mysqli_fetch_array($res)) {
                                                    echo("<option value='".$row['company_name']."'>".$row['company_name']."</option>");
                                                }
                                                ?>
                                               
                                                </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="vehicle_type"><strong>Type</strong></label><select name ="vehicle_type" class="mdb-select md-form form-control" required>
                                                   
                                                    <option value="BYK">BYK</option>
                                                    <option value="COM">COM</option>
                                                    <option value="PVT">PVT</option>
                                                    <option value="Other">Other</option>
                                                    </select></div>    
                                                </div>
                                            </div><div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="location"><strong>Location</strong></label><input class="form-control" value="Rajkot" type="text" placeholder="Enter Location" name="location" required></div>
                                                   
                                                </div>
                                                <div class="col">
                                                <div class="form-group"><label for="vehicle_number"><strong>Vehicle Number</strong></label><input class="form-control" type="text" placeholder="Enter Vehicle Number" name="vehicle_number" required></div>
                                                   
                                                </div>
                                               
                                            </div><div class="form-row">
                                            <div class="col">
                                                    <div class="form-group"><label for="cash"><strong>Total Cash</strong></label><input class="form-control" type="number" required placeholder="Enter Cash" name="cash"></div>
                                                </div>
                                                <div class="col">
                                                <div class="form-group"><label for="km"><strong>Total KM</strong></label><input class="form-control" type="number" placeholder="Enter Kilometer" name="km"></div>
                                                </div>
                                               
                                            </div>
                                            <div class="form-row">
                                            <div class="col-md-6">
                                                            <div class="form-group "  ><label for="date"><strong>Date</strong></label><div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd" >
                                                        <input class="form-control" required type="text" name="issue_date"/>
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    </div>

                                                    </div>
                                                   
                                                </div>
                                                </div>
                                            
                                            <div class="form-group"><input type="submit" class="btn btn-primary btn-sm"  value="Add Case" name="add_case"/></div>
                                        </form>
                                        <br>
                                        <?php 
                                        if(isset($_REQUEST["err"]))
                                            $msg="Fill the required fields";
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
                               
                                   
                                    
                                    <div class="card-body">
                                        
                                        
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
        </div>
                        <?php include_once('includes/footer.php'); ?>
