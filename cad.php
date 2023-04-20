<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Coustomer Database</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            .scroll {
    max-height: 100%;
    overflow-y: auto;
          }
          </style>
    </head>
    <body>
    <?php
require_once "navbar.php";
?>


            <div id="layoutSidenav_content"> 
            <div id="layoutAuthentication_content"> 
            <main>        
            <div class="container"> 
            <div class="row justify-content-center"> 
            <div class="col-lg-12">

            <?php
                    $from = "" ;
                    // Include config file
                    require_once "config.php";
                    


                    // Attempt select query execution
                    $sql = "SELECT * FROM coustomeradd";
                    $record = "SELECT count(*) FROM coustomeradd";
                    $count = mysqli_query($link, $record) ;
                    $tourresult = $count->fetch_array()[0] ?? '';
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                          echo '<div id="myTableWrapper">' ;
                          echo '<table class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">';                             
                             echo '<thead class="thead-dark">';
                                    echo "<tr >";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>City</th>";
                                        echo "<th>state</th>";
                                        echo "<th>country</th>";
                                        echo "<th>Mobile</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>DOB</th>";
                                        echo "<th>DOA</th>";
                                        echo "<th>DND</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['cou_name'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>" . $row['state'] . "</td>";
                                        echo "<td>" . $row['country'] . "</td>";
                                        echo "<td>" . $row['mobile_no'] . "</td>";
                                        echo "<td>" . $row['mail_id'] . "</td>";
                                        echo "<td>" . $row['dob'] . "</td>";
                                        echo "<td>" . $row['doa'] . "</td>";
                                        echo "<td>" . $row['DND'] . "</td>";

                                        echo "<td>";
                                            echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye fa-beat"></i>"></span></a>';
                                            echo '&nbsp<a href="update_cas.php?uid='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil fa-beat"></span></a>';
                                            echo '&nbsp<a href="ajax.php?DND=Yes&id='. $row['id'] .' " title="Start DND" data-toggle="tooltip"><span class="fa fa-ban fa-beat" style="color: #ea1506;"></span></a>';
                                            echo '&nbsp<a href="ajax.php?DND=No&id='. $row['id'] .' " title="Start DND" data-toggle="tooltip"><span class="fa fa-phone fa-beat" style="color: #a2ee02;"></span></a>';

                                            
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            
                            echo '</div>';
                            echo '<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>';
  echo '<script src="https:////cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>';
  echo '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">';

  // initialize DataTables
  echo '<script>
    $(document).ready(function() {
      $("#myTableWrapper table").DataTable({
        "pageLength": 10
      });
    });
  </script>';
                            echo 'Total record :'.$tourresult;

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
      </main>
      </div>

      <div id="layoutAuthentication_footer">
      <footer class="py-4 bg-black mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
