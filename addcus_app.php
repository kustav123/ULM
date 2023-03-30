<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add Coustomer</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
   
            <?php
// Include config file
require_once "config.php";
require_once "navbar.php";
// Define variables and initialize with empty values
$cou_name = $dob = $address = $mobile_no = $mail_id = $doa = "";
$cou_name_err = $address_err = $mobile_no_err = $mail_id_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["mob"])){
  
  $mobile_no = trim($_GET["mob"]) ;
}
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_cou_name = trim($_POST["cou_name"]);
    if(empty($input_cou_name)){
        $cou_name_err = "Please enter a name.";
    } elseif(!filter_var($input_cou_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $cou_name_err = "Please enter a valid name.";
    } else{
        $cou_name = $input_cou_name;
    }
    
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }

    $input_mail_id = trim($_POST["mail_id"]);
    if(empty($input_mail_id)){
        $mail_id_err = "Please enter an email.";     
    } else{
        $mail_id = $input_mail_id;
    }

    $input_dob = trim($_POST["dob"]);
    if(empty($input_dob)){
        $dob_err = "Please enter an DOB.";     
    } else{
        $dob = $input_dob;
    }
    $input_doa = trim($_POST["doa"]);
    if(empty($input_doa)){
        $doa_err = "Please enter an DOA.";     
    } else{
        $doa = $input_doa;
    }
    // Validate salary
    $input_mobile_no = trim($_POST["mobile_no"]);
    if(empty($input_mobile_no)){
        $mobile_no_err = "Please enter Mobile number.";     
    } elseif(!ctype_digit($input_mobile_no)){
        $mobile_no_err = "Please enter a Mobile number.";
    } else{
        $mobile_no = $input_mobile_no;
    }
    
    // Check input errors before inserting in database
    if(empty($cou_name_err) && empty($address_err) && empty($mobile_no_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO coustomeradd (cou_name, address, mobile_no, mail_id, dob, doa) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters 
            mysqli_stmt_bind_param($stmt, "ssssss", $param_cou_name, $param_address, $param_mobile_no, $param_mail_id, $param_dob, $param_doa);
            
            // Set parameters
            $param_cou_name = $cou_name;
            $param_address = $address;
            $param_mobile_no = $mobile_no;
            $param_mail_id = $mail_id;
            $param_dob = $dob;
            $param_doa = $doa;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                // header("Location: seals.php?mob=$mobile_no");
                logActivity('Add', 'Customer', 'Created Customer ' . $cou_namef .' by '.  $_SESSION["username"] , $_SESSION["id"] );

                echo("<script>location.href = '/sb/in.php?mob=$mobile_no';</script>");

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
}
?>

        <div id="layoutSidenav_content">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg bg-info text-white border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light text-info my-4">Add New Coustomer</h3></div>
                                    <div class="card-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                           <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="text" maxlength="10" pattern="\d{10}" name="mobile_no" id="mobile_no" class="form-control <?php echo (!empty($mobile_no_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mobile_no; ?>">
                                                <span class="invalid-feedback"><?php echo $mobile_no_err;?></span>
                                            </div> 
                                           <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="cou_name" class="form-control <?php echo (!empty($cou_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cou_name; ?>">
                                                <span class="invalid-feedback"><?php echo $cou_name_err;?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                                                <span class="invalid-feedback"><?php echo $address_err;?></span>
                                            </div>
                                            
                    
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="mail_id" class="form-control <?php echo (!empty($mail_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mail_id; ?>">
                                                <span class="invalid-feedback"><?php echo $mail_id_err;?></span>
                                            </div>
                    
                                            <div class="form-group">
                                                <label>Date of birth</label>
                                                <input type="date" name="dob" class="form-control <?php echo (!empty($dob_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dob; ?>">
                                                <span class="invalid-feedback"><?php echo $dob_err;?></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Date of anniversary</label>
                                                <input type="date" name="doa" class="form-control <?php echo (!empty($doa_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $doa; ?>">
                                                <span class="invalid-feedback"><?php echo $doa_err;?></span>
                                            </div>
                                        </br><input type="submit" class="btn btn-primary" value="Submit">
                                            <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>

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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

        <script type="text/javascript">
document.getElementById("mobile_no").addEventListener("blur", function() {
  var mobile = document.getElementById("mobile_no").value;
  var submitBtn = document.querySelector('input[type="submit"]');

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var data = JSON.parse(this.responseText);
      if (data.mob == "No Data") {
        submitBtn.disabled = false;
        var errorText = document.getElementById("mobile_no_error");
        if (errorText) {
          errorText.parentNode.removeChild(errorText);
        }
      } else {
        var errorText = document.getElementById("mobile_no_error");
        if (!errorText) {
          errorText = document.createElement("span");
          errorText.setAttribute("id", "mobile_no_error");
          errorText.style.color = "red";
          document.getElementById("mobile_no").parentNode.appendChild(errorText);
        }
        errorText.textContent = "Customer already in database!!!";
        submitBtn.disabled = true;
      }
    }
  };
  xhttp.open("GET", "ajax.php?mob=" + mobile, true);
  xhttp.send();
});

</script>
    </body>
</html>
