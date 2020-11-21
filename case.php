<?php

require_once './config/config.php';
require_once './includes/auth_validate.php';
// $sql = "SELECT a.*,b.*,c.*,d.*    FROM case_register a  INNER JOIN company b ON a.company_id = b.id INNER JOIN source c ON a.source_id = c.id INNER JOIN surveyor d ON  a.surveyor_id = d.id ";
// $sql = "SELECT a.*,b.*,c.*,d.*  FROM case_register a, company b, source c, surveyor d WHERE a.company_id = b.id AND a.source_id = c.id AND a.surveyor_id = d.id ORDER BY issue_date DESC";
// $result = $mysqli->query($sql);

	$sql = "SELECT a.*,b.*,c.*,d.*  FROM case_register a, company b, source c, surveyor d WHERE a.company_id = b.id AND a.source_id = c.id AND a.surveyor_id = d.id ORDER BY issue_date DESC";
	$result = $mysqli->query($sql);
 include_once('includes/header.php');?>



<div id="wrapper">
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Case Register</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="add_case.php"><i class="fa fa-plus fa-sm text-white-50"></i>&nbsp;Add Case</a></div>
                
                </div>
            </div>
        </div>
   <div class="container-fluid">

                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Case List</p>
                    </div>
                    <div class="card-body">
                        
                        <button type="button" id="download" class="btn btn-primary">Download</button>
                        <div class="table table-responsive  table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <?php
                        if ($result->num_rows > 0)
                        {
                        ?>
                            <table class="table my-0" id="case_register">
                                <thead>
                                <tr>
                                    <th>Surveyor </th>
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
                                  
                                    echo "<td>".$row['surveyor_name']."</td>";
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


    <?php include_once('includes/footer.php'); 



?>
<script type='text/javascript'>
   $(document).ready(function(){
     $('.dateFilter').datepicker({
        dateFormat: "yy-mm-dd"
     });
   });
   </script>

<script type="text/javascript">
$('#case_register').ddTableFilter();
$("#download").click(function(){
    $("#case_register").tableHTMLExport({

        type:'csv',

        filename:'case.csv',

        separator:',',

        newline:'\r\n',

        trimContent:true,

        quoteFields:true,

        htmlContent:false,

        consoleLog:false,       

        });
});



</script>

