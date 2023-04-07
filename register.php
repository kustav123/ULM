<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add User</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
   
<?php
require_once "navbar.php";
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$cou_namef =$cou_names = $username = $password = $hashed_password = $role = "";
$cou_name_errf = $cou_name_errs = $password_err = $username_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_cou_namef = trim($_POST["inputFirstName"]);
    if(empty($input_cou_namef)){
        $cou_name_errf = "Please enter a First Name.";
    } elseif(!filter_var($input_cou_namef, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $cou_name_errf = "Please enter a valid name.";
    } else{
        $cou_namef = $input_cou_namef;
    }
    $input_cou_names = trim($_POST["inputLastName"]);
    if(empty($input_cou_names)){
        $cou_name_errs = "Please enter a Second Name.";
    } elseif(!filter_var($input_cou_names, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $cou_name_errs = "Please enter a valid name.";
    } else{
        $cou_names = $input_cou_names;
    }
    // Validate address
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter an Username";     
    } else{
        $username = $input_username;
    }

    $input_Password = trim($_POST["inputPassword"]);
    if(empty($input_Password)){
        $password_err = "Please enter a password.";     
    } else{
        $password = $input_Password;
    }


    
    // Check input errors before inserting in database
    if(empty($cou_name_errf) && empty($username_err) && empty( $password_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, role, fname, lname) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters 
            mysqli_stmt_bind_param($stmt, "ssiss",$username, $hashed_password,$role,$cou_namef, $cou_names);
            
            // Set parameters
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = $_POST["role"] ;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                // header("Location: seals.php?mob=$mobile_no");
                echo '<script type="text/javascript">
				location.replace("userad.php");
			  </script>';
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
      //  mysqli_stmt_close($stmt);
    }
    
    // Close connection
    // mysqli_close($link);
}
?>
        <div id="layoutSidenav_content">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg bg-info text-white border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light text-info my-4">Add New User</h3></div>
                                    <div class="card-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                           <div class="form-group">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <input type="text" id="inputFirstName" name="inputFirstName"  class="form-control <?php echo (!empty($cou_name_errf)) ? 'is-invalid' : ''; ?>" value="<?php echo $cou_namef; ?>">
                                                    <span class="invalid-feedback"><?php echo $cou_name_errf;?></span>
                                                        <label for="inputFirstName">First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">

                                                    <input type="text" id="inputLastName" name="inputLastName"  class="form-control <?php echo (!empty($cou_name_errs)) ? 'is-invalid' : ''; ?>" value="<?php echo $cou_names; ?>">
                                                    <span class="invalid-feedback"><?php echo $cou_name_errs;?></span>
                                                    <label for="inputLastName">Last name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                            <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                    <input type="text" id="username" name="username" pattern="^(?=.*(@vdr|@VDR))[a-zA-Z0-9@._-]{7,20}$" class="form-control <?php echo (!empty( $username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                                                    <span class="invalid-feedback"><?php echo $username_err;?></span>
                                                    <label for="username">Username</label>

                                             </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form mb-3">
                                            <label for="jobrole">Job Role</label>
                                            <?php
                                                 // Include config file
                                             
                                                 // Define variables and initialize with empty values 
                                                 $sqla = "SELECT id, name FROM role ";
                                                 $resulta = $link->query($sqla);
                       
                                                 // Create dropdown
                                                 echo '<select name="role" class="form-control" id="role" placeholder="role">';
                                                 while($row = $resulta->fetch_assoc()) {
                                                     echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                 }
                                                 echo '</select>';
                       
                                                 
                                                 ?>         
                                            </div>
                                            </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">

                                                    <input  id="inputPassword" type="password" name="inputPassword"  class="form-control <?php echo (!empty( $password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                                            <label for="password">Password</label>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
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

     <script type="text/javascript">
           $(document).ready(function() {
            var submitBtn = document.querySelector('input[type="submit"]');
            $('#username').keyup(function() {
                var username = $(this).val();
                $.ajax({
                url: 'ajax.php',
                data: { uname: username },
                dataType: 'json',
                success: function(response) {
                    if (response.uname == 'not ok') {
                        var errorText = document.createElement("span");
                        errorText.textContent = "Username Allready exists!!";
                        errorText.style.color = "red";
                        var parentElement = document.getElementById("username").parentNode;
                        parentElement.insertBefore(errorText, parentElement.lastChild);
                        submitBtn.disabled = true;
                        document.getElementById("name").value = "";
                    } else {
                        var existingError = document.querySelector("#username ~ span");
                        if (existingError) {
                        existingError.remove();
                    }
                    submitBtn.disabled = false;
                            }
                    }
                    });
                });
                });
</script>

<script type="text/javascript">
// Get references to the password input fields
var passwordField = document.getElementById('inputPassword');
var confirmPasswordField = document.getElementById('inputPasswordConfirm');

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
