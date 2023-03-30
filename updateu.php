<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Update user</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
   

<?php
// Include config file
require_once "config.php";
require_once "navbar.php";
// Define variables and initialize with empty values
$name = $address = $salary = "";
$name_err =  "";
 
// Processing form data when form is submitted
if(isset($_POST["uid"]) ){
    // Get hidden input value
   

    if(!isset($_POST["role"]) || empty($_POST["role"])){
        echo '<script type="text/javascript">
				location.replace("userad.php");
			  </script>';
    }
    // Validate name
   
    
    // Validate address address
  
    
    // Check input errors before inserting in database
    if(isset($_POST["role"])){
        // Prepare an update statement
        $sql = "UPDATE users SET role=? WHERE id=?";
         
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ii", $param_role,  $param_id);

            // Set parameters
            $param_id = $_POST["uid"];
            $param_role = $_POST["role"];

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                logActivity('Update', 'User', 'Update User Role ' . $param_id .' by '.  $_SESSION["username"] , $_SESSION["id"] );    
                echo '<script type="text/javascript">
				location.replace("userad.php");
			  </script>';
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        // mysqli_stmt_close($stmt);
    }

    if(!empty($_POST["inputPassword"])){
        // Prepare an update statement
        $sqlx = "update users set password = ? WHERE id = ?";
        $stmtx = mysqli_prepare($link, $sqlx) ;
        mysqli_stmt_bind_param($stmtx, "ss", $param_pass , $param_id);
        $param_id = $_POST["uid"] ;
        $password = $_POST["inputPassword"] ;
        $param_pass = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_execute($stmtx);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                logActivity('Update', 'User', 'Update User password ' . $param_id .' by '.  $_SESSION["username"] , $_SESSION["id"] );    

                echo '<script type="text/javascript">
				location.replace("userad.php");
			  </script>';
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        // mysqli_stmt_close($stmt);
    
    
    // Close connection
    // mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["uid"]) && !empty(trim($_GET["uid"]))){
        // Get URL parameter
        $id =  trim($_GET["uid"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE id = ?";
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
                    $uname = $row["username"];
                    $fname = $row["fname"] ;
                    
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
        // mysqli_stmt_close($stmt);
        
        // // Close connection
        // mysqli_close($link);
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
                                    <div class="card-header"><h3 class="text-center font-weight-light text-info my-4">Update User Detail</h3></div>
                                    <div class="card-body">


                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <input type="hidden" name="uid" class="form-control" id="uid" value="<?php echo trim($_GET["uid"]); ?>">

                      <div class="row mb-3">
                      <div class="col-md-6">

                      <label for="name">Username:</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $uname; ?>" readonly>
                      </div>
                      <div class="col-md-6">
                      <label for="mob">Firstname:</label>
                      <input type="text" class="form-control" id="mob" name="mob" value="<?php echo $fname; ?>" readonly>
                    </div>
                   </div>

                   <div class="row mb-3">
                        <div class="col-md-6">
                        <label for="jobrole">Update Role</label>
                                            <?php
                                                 // Include config file
                                             
                                                 // Define variables and initialize with empty values 
                                                 $sqla = "SELECT id, name FROM role ";
                                                 $resulta = $link->query($sqla);
                       
                                                 // Create dropdown
                                                 echo '<select name="role" class="form-control" id="role" placeholder="role">';
                                                 echo '<option disabled selected value> Select updated role </option>';

                                                 while($row = $resulta->fetch_assoc()) {
                                                     echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                 }
                                                 echo '</select>';
                       
                                                 
                                                 ?>        
                    </div>
                    <div class="col-md-6">
                      <label for="remarks">Update Password</label>
                      <input  id="inputPassword" type="password" name="inputPassword"  class="form-control"  >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                    
                    </div>
                    <div class="col-md-6">
                      <input type="submit" class="btn btn-primary" value="Submit">
                      </div>
                      </div>


                    </form>
                
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