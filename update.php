<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Update Followup</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>


<?php
// Include config file
require_once "config.php";
require_once "navbar.php";
// Define variables and initialize with empty values
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
   
    
    // Validate name
   
    
    // Validate address address
  
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
        // Prepare an update statement
        $sql = "UPDATE followup SET date=?, remarks=? , updated_by=? , status =?, lastact=now(), remarks_his = concat(remarks_his, ?) WHERE id=?";
         

        if (isset($_POST["status"]) && $_POST["status"] == "on") {
            $stat = 0;
        } else {
            $stat = 1;
        }
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssisi", $param_date, $param_remarks, $upby, $stat, $param_crem ,$param_id);
            
            // Set parameters
            $param_date = $_POST["update"];
            $param_remarks =$_POST["remarks"];
            $param_crem =$_POST["crem"];
            $param_crem .= " by ".$_POST["uby"]. " at ".$_POST["cdate"]."-------";
            $param_id = $_POST["id"];
            $upby = $_SESSION["username"] ;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                logActivity('Update', 'Follow Up', 'Customer Followup ID ' . $param_id .' by '.  $_SESSION["username"] , $_SESSION["id"] );    

                echo '<script type="text/javascript">
				location.replace("fup.php");
			  </script>';
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM followup WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["castname"];
                    $mob = $row["cast_mob"];
                    $cdate = $row["date"] ;
                    $crem = $row["remarks"];
                    $uby = $row["updated_by"];

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>


<body>



<div id="layoutSidenav_content">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg bg-info text-white border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light text-info my-4">Update Record</h3></div>
                                    <div class="card-body">
    <!-- <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"> -->
                    <!-- <h2 class="mt-5">Update Record</h2> -->
                    <p>Please edit the input values and submit to update the employee record.</p>

                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    
                       
                    <input type="hidden" name="id" class="form-control" id="id" value="<?php echo trim($_GET["id"]); ?>">
                    <input type="hidden" name="crem" class="form-control" id="crem" value="<?php echo $crem; ?>">
                    <input type="hidden" name="cdate" class="form-control" id="cdate" value="<?php echo $cdate; ?>">
                    <input type="hidden" name="uby" class="form-control" id="uby" value="<?php echo $uby; ?>">


                    <div class="row mb-3">
                            <div class="col-md-6">

                      <label for="name">Name:</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" readonly>
                      </div>
                      <div class="col-md-6">
                      <label for="mob">Mobile No:</label>
                      <input type="text" class="form-control" id="mob" name="mob" value="<?php echo $mob; ?>" readonly>
                    </div>
                   </div>

                   <div class="row mb-3">
                        <div class="col-md-6">
                      <label for="update">Update:</label>
                      <input type="datetime-local" class="form-control" id="update" name="update"  >
                    </div>
                    <div class="col-md-6">
                      <label for="remarks">Remarks:</label>
                      <textarea class="form-control" id="remarks" name="remarks" maxlength="500" required></textarea>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="status">Closed followup session:</label>
                      <input class="form-check-input" type="checkbox" id="status" name="status">
                    </div>
                    <div class="col-md-6">
                      <input type="submit" class="btn btn-primary" value="Submit">
                      </div>
                      </div>


                    </form>
                <!-- </div>
            </div>        
        </div>
    </div> -->
    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
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