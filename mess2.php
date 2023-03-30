<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Send Notification</title>
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>        <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
        <!-- <link href="css/styles.css" rel="stylesheet" /> -->
        <!-- <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script> -->

  
</head>
    
            <?php
// Include config file
require_once "config.php";
require_once "navbar.php";

// Define variables and initialize with empty values
$messages = $subject_no = "";
$messages_err = $subject_no_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate messages
    $input_messages = trim($_POST["messages"]);
    if(empty($input_messages)){
        $messages_err = "Please enter an messages.";     
    } else{
        $messages = $input_messages;
    }

    // Validate salary
    $input_subject_no = trim($_POST["subject"]);
    if(empty($input_subject_no)){
        $subject_no_err = "Please enter Mobile number.";     
    } else{
        $subject_no = $input_subject_no;
        
    }
    if(empty($_POST["users"])){
        $username_err = "Please enter a username.";     
    } else{
        $param_user = implode(", ", $_POST["users"]);

    }
    // Check input errors before inserting in database
    if(empty($messages_err) && empty($subject_no_err) && empty($username_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO notification (sub, msg, user, fromuser, exptime ) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters 
            mysqli_stmt_bind_param($stmt, "sssss", $subject_no, $messages, $param_user, $_SESSION["username"], $exptime);
            
            // Set parameters
            date_default_timezone_set('Asia/Kolkata'); // set timezone to EST
            $exp = trim($_POST["expiry"]) ;
            $exptime = date('Y-m-d H:i:s',strtotime('+'.$exp.' hours'));; // "now + 48 hrs"
          
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                // header("Location: seals.php?mob=$mobile_no");
                logActivity('Add', 'notif', 'Created Notification ' . $subject_no .' by '.  $_SESSION["username"] , $_SESSION["id"] );
    
                echo("<script>location.href = 'mess.php';</script>");
    
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }
    
         
        // Close statement
        // mysqli_stmt_close($stmt);
    }
    
    // Close connection
//     mysqli_close($link);
// }
?>

        <div id="layoutSidenav_content">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg bg-info text-white border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light text-info my-4">Send Notification</h3></div>
                                    <div class="card-body">
                                        
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                           <div class="form-group">
                                            
                                           <div class="row">
                                                <div class="col">
                                                <label>Subject (Max 20 char)</label>
                                                <input type="text" maxlength="20" name="subject" id="subject" class="form-control <?php echo (!empty($subject_no_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $subject_no; ?>">
                                                <span class="invalid-feedback"><?php echo $subject_no_err;?></span>
                                            </div> 
                                           
                                            
                                            </div>
                                            <div class="form-group">
                                                <label>Messages (Max 150 char)</label>
                                                <textarea name="messages" maxlength="150"class="form-control <?php echo (!empty($messages_err)) ? 'is-invalid' : ''; ?>"><?php echo $messages; ?></textarea>
                                                <span class="invalid-feedback"><?php echo $messages_err;?></span>
                                            </div></br>
                                            
                                            <div class="form-group">
                                            <label for="expiry">Expiry:</label>
                                            <select class="form-control" id="expiry" name="expiry">
                                                <option value="24">24 hours</option>
                                                <option value="48">48 hours</option>
                                                <option value="72">72 hours</option>
                                                <option value="96">96 hours</option>
                                            </select>
                                            </div>
                                            <div class="form-group">
  <label for="users">Select Users:</label>
  <select class="form-control" id="users" name="users[]" multiple>
    <?php
      require_once "config.php";
      $sql = "SELECT username FROM users WHERE status = 1";
      $result = mysqli_query($link, $sql);
      while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
      }
    ?>
  </select>
</div>
<!-- Required CSS for Bootstrap multiselect -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-multiselect@0.9.15/dist/css/bootstrap-multiselect.min.css" rel="stylesheet">
<!-- Required JS for Bootstrap multiselect -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-multiselect@0.9.15/dist/js/bootstrap-multiselect.min.js"></script>
<!-- Activate Bootstrap multiselect -->
<script>
  $(document).ready(function() {
    $('#users').multiselect();
  });
</script>
                  </div>
                                            

                                        </br><input type="submit" class="btn btn-primary" value="Submit">
                                            <a href="mess.php" class="btn btn-secondary ml-2">Cancel</a>

                                      </form>
                                    </div>
                                    <!-- <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div> -->
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
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script> -->

        
    </body>
</html>
