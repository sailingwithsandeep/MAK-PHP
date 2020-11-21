<?php

require_once './config/config.php';
require_once './includes/auth_validate.php';
$sql = "SELECT * FROM surveyor";
$result = $mysqli->query($sql);

?>

<?php include_once('includes/header.php');?>


<div id="wrapper">
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Surveyors</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="add_surveyor.php"><i class="fa fa-plus fa-sm text-white-50"></i>&nbsp;Add Surveyor</a></div>
                
                </div>
            </div>
        </div>
   <div class="container-fluid">
                
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Surveyor List</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                                <!-- <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm"><option value="10" selected="">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;</label></div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                            </div> -->
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <?php
                        if( $result->num_rows > 0)
                        {
                        ?>
                            <table class="table my-0" id="dataTable">
                                <thead>
                                <tr>
                                    <th>Surveyor Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>".$row['surveyor_name'] . "</td>";
                                    echo "<td>".$row['email'] . "</td>";
                                    echo '<td> <a href="edit_surveyor.php?id='.$row['id'].'">Edit</a> |
                                    <a href="delete_surveyor.php?id='.$row['id'].'">Delete</a>
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
                        <div class="row">
                            <!-- <div class="col-md-6 align-self-center">
                                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                            </div> -->
                            <div class="col-md-6">
                                <!-- <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                                </nav> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    <?php include_once('includes/footer.php'); ?>
   

