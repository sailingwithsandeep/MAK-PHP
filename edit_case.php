<?php
require_once './includes/auth_validate.php';
require_once './config/config.php';
  
        
if(isset($_GET['case_id']) && is_numeric($_GET['case_id'])){
    
    $case_id = $_GET['case_id'];
    $get_case = mysqli_query($mysqli,"SELECT a.*,b.*,c.*,d.*  FROM case_register a, company b, source c, surveyor d WHERE a.company_id = b.id AND a.source_id = c.id AND a.surveyor_id = d.id AND case_id='$case_id'");
    $data = mysqli_fetch_array($get_case);


    if(mysqli_num_rows($get_case) === 1){
        
        $fetch = mysqli_fetch_assoc($get_case);
      
        



 include_once('includes/header.php'); ?>
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
                                        <form action="" method="POST">
                                            <div class="form-row">
                                                <div class="col">
                                              
                                            <div class="form-group"><label for="surveyor_name"><strong>Surveyor</strong></label>  <select class="mdb-select md-form form-control" type="text" placeholder="Select Surveyor " name="surveyor_name" required>
                                            
                                            <?php
                                                $res = mysqli_query($mysqli, "SELECT * FROM surveyor ORDER BY id ASC ");
                                                while($row = mysqli_fetch_array($res)) {
                                                    $selected = '';
                                                    if ($data['surveyor_name'] == $row['surveyor_name']) {
                                                         $selected = 'selected';   
                                                    }
                                                echo '<option value="' . htmlspecialchars($row['surveyor_name']) . '" '.$selected.'>' 
                                                . htmlspecialchars($row['surveyor_name']) 
                                                . '</option>';
                                              }    
                                                   
                                                   
                                                //     // echo("<option value='".$data['surveyor_name']."'selected>".$data['surveyor_name']."</option>");
                                                    
                                                //      if($data['surveyor_name']== $row['surveyor_name']){"<option value='".$row['surveyor_name']."'selected>".$row['surveyor_name']."</option>";}else{ echo("<option value='".$row['surveyor_name']."'>".$row['surveyor_name']."</option>");}
                                                
                                              
                                            ?>
                                               

                                                </select></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="source"><strong>Source</strong></label> <select class="mdb-select md-form form-control" type="text" placeholder="Select Source" name="source_name" required>
                                            <?php
                                                $res = mysqli_query($mysqli, "SELECT * FROM source ORDER BY id ASC ");
                                                while($row = mysqli_fetch_array($res)) {
                                                    $selected = '';
                                                    if ($data['source_name'] == $row['source_name']) {
                                                         $selected = 'selected';   
                                                    }
                                                echo '<option value="' . htmlspecialchars($row['source_name']) . '" '.$selected.'>' 
                                                . htmlspecialchars($row['source_name']) 
                                                . '</option>';
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
                                                $res = mysqli_query($mysqli, "SELECT * FROM company ORDER BY id ASC ");
                                                while($row = mysqli_fetch_array($res)) {
                                                    $selected = '';
                                                    if ($data['company_name'] == $row['company_name']) {
                                                         $selected = 'selected';   
                                                    }
                                                echo '<option value="' . htmlspecialchars($row['company_name']) . '" '.$selected.'>' 
                                                . htmlspecialchars($row['company_name']) 
                                                . '</option>';
                                              }    
                                                ?>
                                               
                                                </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="vehicle_type"><strong>Type</strong></label><select name ="vehicle_type" class="mdb-select md-form form-control">
                                                    <option <?php if($data['type']=="BYK"){echo "selected";}?>>BYK</option>
                                                    <option <?php if($data['type']=="COM"){echo "selected";}?>>COM</option>
                                                    <option <?php if($data['type']=="PVT"){echo "selected";}?>>PVT</option>
                                                    <option <?php if($data['type']=="Other"){echo "selected";}?>>Other</option>

                                            
                                                    </select></div>    
                                                </div>
                                            </div><div class="form-row">
                                            <div class="col">
                                                <div class="form-group"><label for="location"><strong>Location</strong></label><input class="form-control" type="text" placeholder="Enter Location" value="<?php echo $data[3];?>" name="location" required></div>
                                                   
                                                </div>
                                                <div class="col">
                                                <div class="form-group"><label for="vehicle_number"><strong>Vehicle Number</strong></label><input class="form-control" value="<?php echo $data[1]; ?>" type="text" placeholder="Enter Vehicle Number" name="vehicle_number"></div>
                                                   
                                                </div>
                                               
                                            </div><div class="form-row">
                                            <div class="col">
                                                    <div class="form-group"><label for="cash"><strong>Total Cash</strong></label><input class="form-control" type="number" value="<?php echo $data[5]; ?>" placeholder="Enter Cash" name="cash"></div>
                                                </div>
                                                <div class="col">
                                                <div class="form-group"><label for="km"><strong>Total KM</strong></label><input class="form-control" type="number" value="<?php echo $data[4]; ?>" placeholder="Enter Kilometer" name="km"></div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-row">
                                            <div class="col-md-6">
                                                            <div class="form-group "><label for="date"><strong>Date</strong></label><div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd" value="<?php echo $data[9]; ?>">
                                                        <input class="form-control" type="text" name="issue_date"  />
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <div class="form-group"><input type="submit" class="btn btn-primary btn-sm"  value="Update" name="add_case"/></div>
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
                     
<?php
    }
    // else {
    //   echo "Duplicate entry ";
    // }
}
// else {   
//     header("Location:edit_case.php");
    
//  }



if(isset($_POST['surveyor_name']) && isset($_POST['source_name']) && isset($_POST['company_name'])  ){
    
   
    if(!empty($_POST['surveyor_name']) && !empty($_POST['company_name']) && !empty($_POST['source_name']) ){
        
        
        $surveyor_name = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['surveyor_name']));
        $company_name = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['company_name']));
        $source_name = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['source_name']));
        $location = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['location']));
        $vehicle_number = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['vehicle_number']));
        $vehicle_type = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['vehicle_type']));
        $issue_date = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['issue_date']));
        $surveyor_id = mysqli_query($mysqli,"SELECT id FROM surveyor WHERE surveyor_name = '$surveyor_name' ");
        $company_id = mysqli_query($mysqli,"SELECT id FROM company WHERE company_name = '$company_name' ");
        $source_id = mysqli_query($mysqli,"SELECT id FROM source WHERE source_name = '$source_name' ");
        while ($row = $surveyor_id->fetch_assoc()){
            $su_id = $row['id'];
            echo $su_id;
        }
        while ($c_row = $company_id->fetch_assoc()){
            $co_id = $c_row['id'];
            echo $co_id;
        }
        while ($s_row = $source_id->fetch_assoc()){
            $so_id = $s_row['id'];
            echo $so_id;
        }
        $km = $_POST['km'];
        $cash = $_POST['cash'];
       
        $case_id = $_GET['case_id'];
       
      
                // $update_query = mysqli_query($mysqli,"UPDATE `case_register` INNER JOIN surveyor ON (case_register.surveyor_id = surveyor.id) INNER JOIN company ON (case_register.company_id = company.id) INNER JOIN source ON (case_register.source_id = source.id)
                //  SET vehicle_number='$vehicle_number', type='$vehicle_type', issue_date='$issue_date', km='$km', cash='$cash', surveyor_name = '$surveyor_name', source_name = '$source_name',company_name = '$company_name' WHERE case_id = $case_id ");

                $stmt = $mysqli->prepare("UPDATE `case_register` INNER JOIN surveyor ON (case_register.surveyor_id = surveyor.id) INNER JOIN company ON (case_register.company_id = company.id) INNER JOIN source ON (case_register.source_id = source.id)
                SET vehicle_number=?,location=?, type=?, issue_date=?, km=?, cash=?, surveyor_id = ?, source_id = ?,company_id = ? WHERE case_id = ?  ");
                $stmt->bind_param("ssssddiiii",$vehicle_number,$location,$vehicle_type,$issue_date,$km,$cash,$su_id,$so_id,$co_id,$case_id);
                $stmt->execute();
                if($stmt->affected_rows === 0) exit('No rows updated');
                $stmt->close();
                header("Location:case.php");
            
        
        
    }
   
}
include_once('includes/footer.php');
 ?>
