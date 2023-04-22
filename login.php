<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "config.php";
function logActivity($action, $table_name, $additional_info, $uid) {
    global $link;
  
    $timestamp = date('Y-m-d H:i:s');
  
    $sql = "INSERT INTO activity_log ( action, fun, additional_info, uid) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql);
    
    if (!$stmt) {
      // Error handling for failed prepare
      error_log("Error preparing statement: " . mysqli_error($link));
      return;
    }
  
    mysqli_stmt_bind_param($stmt, 'ssss',  $action, $table_name, $additional_info, $uid);
  
    if (!mysqli_stmt_execute($stmt)) {
      // Error handling for failed execute
      error_log("Error executing statement: " . mysqli_error($link));
    }
    
  }
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT photo,store, role, id, username, password FROM users WHERE username = ? and status = 1";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt,$photo, $store ,$role,$id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)&& $role == 1){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;   
                            $_SESSION["role"] = $role;
                            $_SESSION["store"] = $store;   
                            $_SESSION["pic"] = $photo;  
   
                            mysqli_query($link, "UPDATE users SET onstatus = '1' WHERE id = {$_SESSION['id']}");
                            logActivity('Login', 'Logedin', 'User ' .  $_SESSION["username"] . ' Logedin from ' . $_SERVER["REMOTE_ADDR"] , $_SESSION["id"] );

                            // Redirect user to welcome page
                            header("location: index.php");
                        } elseif (password_verify($password, $hashed_password)&& $role == 2){
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;   
                            $_SESSION["role"] = $role;  
                            $_SESSION["store"] = $store;  
                            $_SESSION["pic"] = $photo;  

                            mysqli_query($link, "UPDATE users SET onstatus = '1' WHERE id = {$_SESSION['id']}");                   
                            logActivity('Login', 'Logedin', 'User ' .  $_SESSION["username"] . ' Logedin from ' . $_SERVER["REMOTE_ADDR"] , $_SESSION["id"] );

                            // Redirect user to welcome page
                            header("location: in.php");
                        } 
                        elseif (password_verify($password, $hashed_password)&& $role == 3){
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;   
                            $_SESSION["role"] = $role;   
                            $_SESSION["store"] = $store;
                            $_SESSION["pic"] = $photo;  

                            mysqli_query($link, "UPDATE users SET onstatus = '1' WHERE id = {$_SESSION['id']}");                     
                            logActivity('Login', 'Logedin', 'User ' .  $_SESSION["username"] . ' Logedin from ' . $_SERVER["REMOTE_ADDR"] , $_SESSION["id"] );

                            // Redirect user to welcome page
                            header("location: fm_index.php");
                        } 
                        
                        
                        else{
                            // Password is not valid, display a generic error message
                            
                            $login_err = "Invalid username or password.";
                            logActivity('Login', 'Failed_login_attempt', 'Failed login attempt for  ' .  $username . ' from ' . $_SERVER["REMOTE_ADDR"] , 0 );

                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images_log/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_log/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts_log/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts_log/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_log/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor_log/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_log/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor_log/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor_log/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css_log/util.css">
	<link rel="stylesheet" type="text/css" href="css_log/main.css">


    <title>Login</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <!-- <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style> -->
</head>
<body>
<div class="limiter">
		<div class="container-login100" style="background-image: url('images_log/bg-01.png');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
                <?php 
                if(!empty($login_err)){
                 echo '<div class="alert alert-danger">' . $login_err . '</div>';
                  }        
                  ?>
                    <form class="login100-form validate-form p-b-33 p-t-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    
                        <div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name" <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
						<span class="focus-input100" data-placeholder="&#xe82a;" <?php echo $username_err; ?></span>
					    </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
						<span class="focus-input100" data-placeholder="&#xe80f;" <?php echo $password_err; ?></span>
					    </div>

                        <div class="container-login100-form-btn m-t-32">
						<button type="submit" class="login100-form-btn" value="Login">
							Login
						</button>
					</div>


                        <!-- <input type="text" name="username"  placeholder="Username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>

                        <input type="password" name="password"  placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span> 
                        
                         <a class="forgot text-muted" href="register.php">Sign up now</a> 
                         <input type="submit" class="btn btn-primary" value="Login"> -->







    <!-- <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p> -->
            </form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor_log/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor_log/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor_log/bootstrap/js/popper.js"></script>
	<script src="vendor_log/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor_log/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor_log/daterangepicker/moment.min.js"></script>
	<script src="vendor_log/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor_log/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js_log/main.js"></script>
</body>
</html>