<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Follow up</title>
      <link href="css/styles.css" rel="stylesheet" />
      <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      

    </head>
   <?php
      // Initialize the session
      
      
      require_once "navbar.php";
      require_once "config.php";
      ?>  
   <div id="layoutSidenav_content">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-12">
               <div class="card shadow-lg bg-info text-white border-0 rounded-lg mt-5">
                  <div class="card-header">
                     <h3 class="text-center font-weight-light">Follow Up</h3>
                  </div>
                  <div class="card-body">
                     <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="flush-headingOne">
                            
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#follow-one" aria-expanded="false" aria-controls="flush-collapseOne">
                              Follow up Today
                              </button>
                           </h2>
                           
                           <div id="follow-one" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body">    
                                 <?php
                                    // Include config file
                                    
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM followup where status = '1' and store = '{$_SESSION["store"]}' and date(date) = curdate();";
                                    $record = "SELECT count(*) FROM followup";
                                    
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                          echo '<div id="myTableWrapper">' ;
                                          echo '<table class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">';                             
                                            echo '<thead class="thead-dark">';
                                                    echo "<tr >";
                                                        echo "<th>#</th>";
                                                        echo "<th>Name</th>";
                                                        echo "<th>Mobile</th>";
                                                        echo "<th>Type</th>";
                                                        echo "<th>Remarks</th>";
                                                        echo "<th>Next Followup</th>";
                                                        echo "<th>Updated By</th>";
                                                        echo "<th>History</th>";
                                                        echo "<th>Created By</th>";
                                                        echo "<th>Created At</th>";
                                                        echo "<th>Update</th>";
                                                    echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                while($row = mysqli_fetch_array($result)){
                                                    echo "<tr>";
                                                        echo "<td>" . $row['id'] . "</td>";
                                                        echo "<td>" . $row['castname'] . "</td>";
                                                        echo "<td>" . $row['cast_mob'] . "</td>";
                                                        echo "<td>" . $row['type'] . "</td>";
                                                        echo "<td>" . $row['remarks'] . "</td>";
                                                        echo "<td>" . $row['date'] . "</td>";
                                                        echo "<td>" . $row['updated_by'] . "</td>";
                                                        echo "<td>" . $row['remarks_his'] . "</td>";
                                                        echo "<td>" . $row['createdby'] . "</td>";
                                                        echo "<td>" . $row['createdat'] . "</td>";
                                                        echo "<td>";
                                                            // echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                                            // echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                        echo "</td>";
                                                    echo "</tr>";
                                                }
                                                echo "</tbody>";                            
                                            echo "</table>";
                                            
                                            echo '</div>';
                                            echo '<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>';
                                            echo '<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>';
                                            echo '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">';
                                    
                                            // initialize DataTables
                                            echo '<script>
                                              $(document).ready(function() {
                                                $("#myTableWrapper table").DataTable({
                                                  "pageLength": 10
                                                });
                                              });
                                            </script>';
                                                                      
                                    
                                                                      // Free result set
                                                                      mysqli_free_result($result);
                                                                  } else{
                                                                      echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                                                  }
                                                              } else{
                                                                  echo "Oops! Something went wrong. Please try again later.";
                                                              }
                                          
                                                              // Close connection
                                                              // mysqli_close($link);
                                                              ?>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="flush-headingTwo">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#follow-two" aria-expanded="false" aria-controls="flush-collapseTwo">
                              Follow up Tomorow
                              </button>
                           </h2>
                           <div id="follow-two" class="accordion-collapse collapse " aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body">    
                                 <?php
                                    // Include config file
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM followup where status = '1' and store = '{$_SESSION["store"]}' and date(date) = CURDATE() + INTERVAL 1 DAY;";
                                    $record = "SELECT count(*) FROM followup";
                                    
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                          echo '<div id="myTableWrapperx">' ;
                                          echo '<table class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">';                             
                                            echo '<thead class="thead-dark">';
                                                    echo "<tr >";
                                                        echo "<th>#</th>";
                                                        echo "<th>Name</th>";
                                                        echo "<th>Mobile</th>";
                                                        echo "<th>Type</th>";
                                                        echo "<th>Remarks</th>";
                                                        echo "<th>Next Followup</th>";
                                                        echo "<th>Updated By</th>";
                                                        echo "<th>History</th>";
                                                        echo "<th>Created By</th>";
                                                        echo "<th>Created At</th>";
                                                        echo "<th>Update</th>";
                                                    echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                while($row = mysqli_fetch_array($result)){
                                                    echo "<tr>";
                                                        echo "<td>" . $row['id'] . "</td>";
                                                        echo "<td>" . $row['castname'] . "</td>";
                                                        echo "<td>" . $row['cast_mob'] . "</td>";
                                                        echo "<td>" . $row['type'] . "</td>";
                                                        echo "<td>" . $row['remarks'] . "</td>";
                                                        echo "<td>" . $row['date'] . "</td>";
                                                        echo "<td>" . $row['updated_by'] . "</td>";
                                                        echo "<td>" . $row['remarks_his'] . "</td>";
                                                        echo "<td>" . $row['createdby'] . "</td>";
                                                        echo "<td>" . $row['createdat'] . "</td>";
                                                        echo "<td>";
                                                            // echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                                            // echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                        echo "</td>";
                                                    echo "</tr>";
                                                }
                                                echo "</tbody>";                            
                                            echo "</table>";
                                            
                                            echo '</div>';
                                            echo '<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>';
                                            echo '<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>';
                                            echo '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">';
                                    
                                            // // initialize DataTables
                                            echo '<script>
                                              $(document).ready(function() {
                                                $("#myTableWrapperx table").DataTable({
                                                  "pageLength": 10
                                                });
                                              });
                                            </script>';
                                    
                                                                      // Free result set
                                                                      mysqli_free_result($result);
                                                                  } else{
                                                                      echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                                                  }
                                                              } else{
                                                                  echo "Oops! Something went wrong. Please try again later.";
                                                              }
                                          
                                                              // Close connection
                                                              //mysqli_close($link);
                                                              ?>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="flush-headingTwo">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#follow-three" aria-expanded="false" aria-controls="flush-collapseTwo">
                              More then 2 Days 
                              </button>
                           </h2>
                           <div id="follow-three" class="accordion-collapse collapse " aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body">    
                                 <?php
                                    // Include config file
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM followup where status = '1' and store = '{$_SESSION["store"]}' and date(date) > DATE_ADD(CURDATE(), INTERVAL 1 DAY);";
                                    $record = "SELECT count(*) FROM followup";
                                    
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                          echo '<div id="myTableWrappery">' ;
                                          echo '<table class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">';                             
                                            echo '<thead class="thead-dark">';
                                                    echo "<tr >";
                                                        echo "<th>#</th>";
                                                        echo "<th>Name</th>";
                                                        echo "<th>Mobile</th>";
                                                        echo "<th>Type</th>";
                                                        echo "<th>Remarks</th>";
                                                        echo "<th>Next Followup</th>";
                                                        echo "<th>Updated By</th>";
                                                        echo "<th>History</th>";
                                                        echo "<th>Created By</th>";
                                                        echo "<th>Created At</th>";
                                                        echo "<th>Update</th>";
                                                    echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                while($row = mysqli_fetch_array($result)){
                                                    echo "<tr>";
                                                        echo "<td>" . $row['id'] . "</td>";
                                                        echo "<td>" . $row['castname'] . "</td>";
                                                        echo "<td>" . $row['cast_mob'] . "</td>";
                                                        echo "<td>" . $row['type'] . "</td>";
                                                        echo "<td>" . $row['remarks'] . "</td>";
                                                        echo "<td>" . $row['date'] . "</td>";
                                                        echo "<td>" . $row['updated_by'] . "</td>";
                                                        echo "<td>" . $row['remarks_his'] . "</td>";
                                                        echo "<td>" . $row['createdby'] . "</td>";
                                                        echo "<td>" . $row['createdat'] . "</td>";
                                                        echo "<td>";
                                                            // echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                                            // echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                        echo "</td>";
                                                    echo "</tr>";
                                                }
                                                echo "</tbody>";                            
                                            echo "</table>";
                                            
                                            echo '</div>';
                                            echo '<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>';
                                            echo '<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>';
                                            echo '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">';
                                    
                                            // // initialize DataTables
                                            echo '<script>
                                              $(document).ready(function() {
                                                $("#myTableWrappery table").DataTable({
                                                  "pageLength": 10
                                                });
                                              });
                                            </script>';
                                    
                                                                      // Free result set
                                                                      //mysqli_free_result($result);
                                                                  } else{
                                                                      echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                                                  }
                                                              } else{
                                                                  echo "Oops! Something went wrong. Please try again later.";
                                                              }
                                          
                                                              // Close connection
                                                              //mysqli_close($link);
                                                              ?>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="flush-headingThree">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#follow-four" aria-expanded="false" aria-controls="flush-collapseThree">
                              Pending Followups
                              </button>
                           </h2>
                           <div id="follow-four" class="accordion-collapse collapse " aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body">  
                                 <?php
                                    // Include config file
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM followup where status = '1' and store = '{$_SESSION["store"]}' and date(date) < CURDATE();";
                                    $record = "SELECT count(*) FROM followup";
                                    
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                                          echo '<div id="myTableWrapperz">' ;
                                          echo '<table class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">';                             
                                            echo '<thead class="thead-dark">';
                                                    echo "<tr >";
                                                        echo "<th>#</th>";
                                                        echo "<th>Name</th>";
                                                        echo "<th>Mobile</th>";
                                                        echo "<th>Type</th>";
                                                        echo "<th>Remarks</th>";
                                                        echo "<th>Next Followup</th>";
                                                        echo "<th>Updated By</th>";
                                                        echo "<th>History</th>";
                                                        echo "<th>Created By</th>";
                                                        echo "<th>Created At</th>";
                                                        echo "<th>Update</th>";
                                                    echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                while($row = mysqli_fetch_array($result)){
                                                    echo "<tr>";
                                                        echo "<td>" . $row['id'] . "</td>";
                                                        echo "<td>" . $row['castname'] . "</td>";
                                                        echo "<td>" . $row['cast_mob'] . "</td>";
                                                        echo "<td>" . $row['type'] . "</td>";
                                                        echo "<td>" . $row['remarks'] . "</td>";
                                                        echo "<td>" . $row['date'] . "</td>";
                                                        echo "<td>" . $row['updated_by'] . "</td>";
                                                        echo "<td>" . $row['remarks_his'] . "</td>";
                                                        echo "<td>" . $row['createdby'] . "</td>";
                                                        echo "<td>" . $row['createdat'] . "</td>";
                                                        echo "<td>";
                                                            // echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                                            // echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                        echo "</td>";
                                                    echo "</tr>";
                                                }
                                                echo "</tbody>";                            
                                            echo "</table>";
                                            
                                            echo '</div>';
                                            echo '<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>';
                                            echo '<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>';
                                            echo '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">';
                                    
                                            // // initialize DataTables
                                            echo '<script>
                                              $(document).ready(function() {
                                                $("#myTableWrapperz table").DataTable({
                                                  "pageLength": 10
                                                });
                                              });
                                            </script>';
                                    
                                                                      // Free result set
                                                                      mysqli_free_result($result);
                                                                  } else{
                                                                      echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                                                  }
                                                              } else{
                                                                  echo "Oops! Something went wrong. Please try again later.";
                                                              }
                                          
                                                              // Close connection
                                                              mysqli_close($link);
                                                              ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="layoutAuthentication_footer">
         <footer class="py-4 bg-black mt-auto">
            <div class="container-fluid px-4">
               <div class="d-flex align-items-center justify-content-between small">
                  <div class="text-muted">Copyright &copy; Vasundhara 2022</div>
                  <!-- <div>
                     <a href="#">Privacy Policy</a>
                     &middot;
                     <a href="#">Terms &amp; Conditions</a>
                     </div> -->
               </div>
            </div>
         </footer>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
   <script src="js/scripts.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script type="text/javascript"></script>
  
   </body>
</html>