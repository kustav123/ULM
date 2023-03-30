<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add Associate</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    
<?php
require_once "navbar.php";
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$cou_namef = "";
$cou_name_errf = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_cou_namef = trim($_POST["inputfirstName"]);
    if(empty($input_cou_namef)){
        $cou_name_errf = "Please enter Associate Name.";
    } elseif(!filter_var($input_cou_namef, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $cou_name_errf = "Please enter a valid name.";
    } else{
        $cou_namef = $input_cou_namef;
    }
    
    
    // Check input errors before inserting in database
    if(empty($cou_name_errf)){
        // Prepare an insert statement
        $sql = "INSERT INTO associate (name) VALUES (?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters 
            mysqli_stmt_bind_param($stmt, "s",$cou_namef,);
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                // header("Location: seals.php?mob=$mobile_no");
        $sql = "INSERT INTO associate (name) VALUES (?)";
        logActivity('Add', 'Associate', 'Created Associate ' . $cou_namef .' by '.  $_SESSION["username"] , $_SESSION["id"] );

                echo '<script type="text/javascript">
				location.replace("assoread.php");
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
                                    <div class="card-header"><h3 class="text-center font-weight-light text-info my-4">Add Associate</h3></div>
                                    <div class="card-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                           <div class="form-group">
                                            <div class="row mb-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <input type="text" id="inputfirstName" name="inputfirstName"  class="form-control <?php echo (!empty($cou_name_errf)) ? 'is-invalid' : ''; ?>" value="<?php echo $cou_namef; ?>">
                                                    <span class="invalid-feedback"><?php echo $cou_name_errf;?></span>
                                                        <label for="inputfirstName">Associate Name</label>
                                                    
                                                </div>
                                                
                                            </div>

                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">  <input type="submit" class="btn btn-primary" value="Add New Associate"></div>

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
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

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
