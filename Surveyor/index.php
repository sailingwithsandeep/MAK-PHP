<?php


require_once './config/config.php';
require_once './includes/auth_validate.php';
include './includes/header.php';
$surveyor_id = $_SESSION["surveyor_id"];
$surveyor_name = $_SESSION['surveyor_name'];
$sql = "SELECT a.*,b.*,c.*,d.* FROM case_register a, company b, source c, surveyor d WHERE a.company_id = b.id AND a.source_id = c.id AND a.surveyor_id = '$surveyor_id' AND d.surveyor_name = '$surveyor_name'  ORDER BY issue_date DESC";
// echo $surveyor_id;
$result = $mysqli->query($sql);?>
<div id="wrapper">
<div class="d-sm-flex row justify-content-center align-items-center mb-4 mt-2">
                    <h3 class="text-dark text-center"><?php echo "WELCOME ".$_SESSION['surveyor_name']."!"; ?></h3></div>
                
                </div>
            <div class="container-fluid">
                
                </div>
            </div>
        </div>
   <div class="container-fluid">
                
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Case List</p>
                    </div>
                    <div class="card-body">
                        
                        <div class="table table-responsive  table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <?php
                        if ($result->num_rows > 0)
                        {
                        ?>
                            <table class="table my-0" id="example">
                                <thead>
                                <tr>
                                  
                                    <th>Company </th>
                                    <th>Source</th>
                                    <th>Vehicle Number</th>
                                    <th>Location</th>
                                    <th>Type</th>
                                    <th>KM</th>
                                    <th>Cash</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                  
                                   
                                    echo "<td>".$row['company_name']. "</td>";
                                    echo "<td>".$row['source_name'] . "</td>";
                                    echo "<td>".$row['vehicle_number'] . "</td>";
                                    echo "<td>".$row['location'] . "</td>";
                                    echo "<td>".$row['type'] . "</td>";
                                    echo "<td>".$row['km'] . "</td>";
                                    echo "<td>".$row['cash'] . "</td>";
                                    echo "<td>".$row['issue_date'] . "</td>";
                                   
                                    echo '<td> <a href="edit_case.php?case_id='.$row['case_id'].'">Edit</a> 
                                   
                                    </td>';
                                    echo "</tr>";
                                    echo "</tbody>";
                                }
                           
                             ?>   
                        </table>
                        <?php
                        } 
                        else
                        {
                            echo "<br><br>No Record Found";
                        }
                    ?>
                            <?php 
                                if(isset($_REQUEST["err"]))
                                    $msg="Error while deletion";
                                ?>
                                <p style="color:red;">
                                <?php if(isset($msg))
                                {
                                    
                                echo $msg;
                                }
                                    ?>
                       
                        </div>
                        
                    </div>
                </div>
            </div>
    



<?php include_once('includes/footer.php'); ?>
