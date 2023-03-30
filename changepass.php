<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Change Password</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    
<?php
// Include config file
require_once "config.php";
require_once "navbar.php";
// Define variables and initialize with empty values
$input_oldpass = $oldpass_errf = $oldpass = $input_password = $password_err = $password ="";
$cou_name_errf = $cou_name_errs = $password_err = $username_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_oldpass = trim($_POST["oldpass"]);
    if(empty($input_oldpass)){
        $oldpass_errf = "Please enter old password.";
    
    } else{
        $oldpass = $input_oldpass;
    }
    
    // Validate address
    $input_password = trim($_POST["newpass"]);
    if(empty($input_password)){
        $password_err = "Please enter new password";     
    } else{
        $password = $input_password;
    }

    
    if(empty($oldpass_errf) && empty($password_err) ){
        $sql = "SELECT password FROM users WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_id);
               
            $param_id = $_SESSION["id"] ;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt,  $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($oldpass, $hashed_password)){
                            

                            $sqlx = "update users set password = ? WHERE id = ?";
                            $stmtx = mysqli_prepare($link, $sqlx) ;
                            mysqli_stmt_bind_param($stmtx, "ss", $param_pass , $param_id);
                            $param_id = $_SESSION["id"] ;
                            $param_pass = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_execute($stmtx);
                            logActivity('Update', 'Password', 'Update Password for ' . $_SESSION["username"] .' by '.  $_SESSION["username"] , $_SESSION["id"] );

                            echo '<script type="text/javascript">
                                    location.replace("logout.php");
                                </script>';
                exit();
                        } else {
                            $oldpass_errf = "Old password is wrong.";
                            }
                    } 
                        
                        
                        
                else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
        } 
    }
} 
    }
}

?>
        <div id="layoutSidenav_content">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg bg-info text-white border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light text-info my-4">Change Password</h3></div>
                                    <div class="card-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                           <div class="form-group">
                                            <div class="row mb-3">
                                               
                                                <div class="col-md-6">
                                                    <div class="form-floating">

                                                    <input type="password" id="oldpass" name="oldpass"  class="form-control <?php echo (!empty($oldpass_errf)) ? 'is-invalid' : ''; ?>" value="<?php echo $oldpass; ?>">
                                                    <span class="invalid-feedback"><?php echo $oldpass_errf;?></span>
                                                    <label for="oldpass">Old Password</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                  
                                                    <input type="password" id="newpass" name="newpass"  class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                                                    <span class="invalid-feedback"><?php echo $password_err;?></span>
                                            <label for="newpass">New Password</label></div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">

                                                        <input type="password" input class="form-control" id="repepass" name="repepass" type="password" placeholder="Confirm password" />
                                                        <label for="repepass">Retype Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">  <input type="submit" class="btn btn-primary" value="Create Account"></div>

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

     

<script type="text/javascript">
// Get references to the password input fields
var passwordField = document.getElementById('newpass');
var confirmPasswordField = document.getElementById('repepass');

// Add an event listener to the confirmPasswordField to check if the passwords match
confirmPasswordField.addEventListener('input', function() {
    if (passwordField.value !== confirmPasswordField.value) {
        confirmPasswordField.setCustomValidity('Passwords do not match');
    } else {
        confirmPasswordField.setCustomValidity('');
    }
});
</script>   

    </body>
</html>
