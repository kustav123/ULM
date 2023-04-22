<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Change Details</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    
<?php
// Include config file
require_once "config.php";
require_once "navbar.php";

// Define variables and initialize with empty values
$lname = $fname = $photo = $input_fname = $input_lname = $fname_err = $lname_err = $photo = "" ; 

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT fname, lname, photo FROM users WHERE id = {$_SESSION['id']}";
    $result = mysqli_query($link, $sql); // assuming you have a valid $connection object

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $fname = $row['fname'];
        $lname = $row['lname'];
        $photo = $row['photo'];

        // Now you can use the $fname and $lname variables as needed
    }
}
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_fname = trim($_POST["fname"]);
    if(empty($input_fname)){
        $fname_err = "Blank First name not allowed .";
    
    } else{
        $fname = $input_fname;
    }
    
    // Validate address
    $input_lname = trim($_POST["lname"]);
    if(empty($input_lname)){
        $lname_err = "Blank Last name not allowed .";     
    } else{
        $lname = $input_lname;
    }
    if ($_FILES["photo"]) {
        $photonew = $_FILES["photo"];
        if ($photonew["error"] == 4) {
            $photonew = trim($_POST["photoold"]); //Keep the original name
        } else {
            $username = $_SESSION["username"];
            $date = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
            $date_string = $date->format('YmdHis'); // format the date as a string without spaces
            $photo_name = $photonew['name'];
            $photo_ext = pathinfo($photo_name, PATHINFO_EXTENSION);
            $new_photo_name = $username . $date_string . '.' . $photo_ext;
            $photo_path = "/ulm/photo/" . $new_photo_name;
            move_uploaded_file($photonew["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $photo_path);
            $photonew = $new_photo_name;
        }
    }
      
    if(empty($fname_err) && empty($lname_err) ){
        

      $sql = "update users set fname = ?, lname = ?, photo = ? WHERE id = ?";
      $stmt = mysqli_prepare($link, $sql) ;
      mysqli_stmt_bind_param($stmt, "sssi", $pram_fname , $pram_lname , $param_photo , $param_id);
                            $param_id = $_SESSION["id"] ;
                            $pram_fname = $fname ; 
                            $pram_lname = $lname ; 
                            $param_photo = $photonew ; 

                            mysqli_stmt_execute($stmt);
                            logActivity('Update', 'UserDetail', 'Update UserDetail for ' . $_SESSION["username"] .' by '.  $_SESSION["username"] , $_SESSION["id"] );

                            // echo '<script type="text/javascript">
                            //         location.replace("changesetting.php");
                            //     </script>';
                exit();
                        } else {
                            $oldpass_errf = "Old password is wrong.";
                            }
                    } 
                        
                        
                        
                else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
       

?>
        <div id="layoutSidenav_content">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg bg-info text-white border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light text-info my-4">Change User Details </h3></div>
                                    <div class="card-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="photoold" class="form-control" id="photoold" value="<?php echo $photo ?>">

                                           <div class="form-group">
                                            <div class="row mb-3">
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                  
                                                    <input type="fname" id="fname" name="fname"  class="form-control <?php echo (!empty($fname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fname; ?>">
                                                    <span class="invalid-feedback"><?php echo $fname_err;?></span>
                                                    <label for="fname">First Name</label></div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">

                                                    <input type="lname" id="lname" name="lname"  class="form-control <?php echo (!empty($lname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lname; ?>">                                                     
                                                    <span class="invalid-feedback"><?php echo $lname_err;?></span>
                                                    <label for="repepass">Last Name</label>

                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg">
                                                    <label for="photo">Upload Photo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">  <input type="submit" class="btn btn-primary" value="Update Details"></div>

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
                            <div class="text-muted">Copyright &copy; Vasundhara 2023</div>
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
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

     



    </body>
</html>
