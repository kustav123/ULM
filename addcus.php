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

        <style>
.frmSearch {
    border: 1px solid #a8d4b1;
    background-color: #c6f7d0;
    margin: 2px 0px;
    padding: 30px;
    border-radius: 4px;
}

#country-list {
    float: left;
    list-style: none;
    margin-top: -3px;
    margin-left: 3px;
    padding: 0;
    width: 170px;
    color: black;
    position: absolute;
    z-index: 1;
}

#country-list li {
    padding: 10px;
    background: #f0f0f0;
    border-bottom: #bbb9b9 1px solid;
}

#country-list li:hover {
    background: #ece3d2;
    cursor: pointer;
}
#state-list {
    float: left;
    list-style: none;
    margin-top: -3px;
    margin-left: 3px;
    padding: 0;
    width: 170px;
    color: black;
    position: absolute;
    z-index: 1;
}

#state-list li {
    padding: 10px;
    background: #f0f0f0;
    border-bottom: #bbb9b9 1px solid;
}

#state-list li:hover {
    background: #ece3d2;
    cursor: pointer;
}
/* #search-box {
    padding: 10px;
    border: #a8d4b1 1px solid;
    border-radius: 4px; 
} */
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
    $("#country").keyup(function() {
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: 'keyword=' + $(this).val(),
            beforeSend: function() {
                $("#country");
            },
            success: function(data) {
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#country");
            }
        });
    });
});
function selectCountry(val) {
    $("#country").val(val);
    $("#suggesstion-box").hide();
}
</script>

<script>
$(document).ready(function() {
    $("#state").keyup(function() {
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: 'keystate=' + $(this).val(),
            beforeSend: function() {
                $("#state");
            },
            success: function(data) {
                $("#suggesstion-bo").show();
                $("#suggesstion-bo").html(data);
                $("#state");
            }
        });
    });
});
function selectState(val) {
    $("#state").val(val);
    $("#suggesstion-bo").hide();
}
</script>
    </head>
    
            <?php
// Include config file
require_once "config.php";
require_once "navbar.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL);
ini_set('display_errors',1);
// Define variables and initialize with empty values
$cou_name = $doa = $dob = $address = $mobile_no = $mail_id = "";
$cou_name_err = $address_err = $mobile_no_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["mob"])){
  
  $mobile_no = trim($_GET["mob"]) ;
}
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_cou_name = trim($_POST["cou_name"]);
    if(empty($input_cou_name)){
        $cou_name_err = "Please enter a name.";
    } elseif(!filter_var($input_cou_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s.]+$/")))){
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
    
    if(!isset($_POST["mail_id"])){
        $mail_id = '' ;
    } else {
        $mail_id = trim($_POST["mail_id"]);
    }
    if(!isset($_POST["dob"])){
        $dob = '' ;
    } else {
        $dob = trim($_POST["dob"]);
    }
    if(!isset($_POST["doa"])){
        $doa = '' ;
    } else {
        $doa = trim($_POST["doa"]);
    }
    if(!isset($_POST["state"])){
        $state = '' ;
    } else {
        $state = trim($_POST["state"]);
    } if(!isset($_POST["country"])){
        $country = '' ;
    } else {
        $country = trim($_POST["country"]);
    }
    $input_mobile_no = trim($_POST["mobile_no"]);
    if(empty($input_mobile_no)){
        $mobile_no_err = "Please enter Mobile number.";     
    } elseif(!ctype_digit($input_mobile_no)){
        $mobile_no_err = "Please enter a Mobile number.";
    } else{
        $mobile_no = $input_mobile_no;
        $code = trim($_POST["ccode"]);
        $mobile_no = $code . $mobile_no;
    }
    
    // Check input errors before inserting in database
    if(empty($cou_name_err) && empty($address_err) && empty($mobile_no_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO coustomeradd (cou_name, address, state, country, mobile_no, mail_id, dob, doa) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters 
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_cou_name, $param_address, $state, $country, $param_mobile_no, $param_mail_id, $param_dob, $param_doa);
            
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
                logActivity('Add', 'Customer', 'Created Customer ' . $cou_name .' by '.  $_SESSION["username"] , $_SESSION["id"] );

                if (strstr($_SERVER['HTTP_REFERER'] , 'http://localhost/ulm/exci.php')) {
                    echo("<script>location.href = '/ulm/abc.php?mob=$mobile_no';</script>");
                }  else {            
                echo("<script>location.href = '/ulm/in.php?mob=$mobile_no';</script>");
                }
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
                                            
                                           <div class="row mb-3">
                                           <div class="col-md-2">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <select id="ccode" name="ccode" placeholder="Code" input
                                                        class="form-control">
                                                        <option selected>+91</option>
                                                        <option>+1</option>
                                                        <option>+44</option>
                                                    </select>
                                                    <label for="ccode">Code</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <input type="text" id="mobile_no"
                                                        name="mobile_no" placeholder="Mobile" input class="form-control <?php echo (!empty($mobile_no_err)) ? 'is-invalid' : ''; ?>"
                                                        value="<?php echo $mobile_no; ?>">
                                                    <span class="invalid-feedback">
                                                        <?php echo $mobile_no_err; ?>
                                                    </span>
                                                    <label for="mobile_no">Mobile</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <input type="text" id="cou_name"
                                                        name="cou_name" placeholder="Name" input class="form-control <?php echo (!empty($cou_name_err)) ? 'is-invalid' : ''; ?>"
                                                        value="<?php echo $cou_name; ?>">
                                                    <span class="invalid-feedback">
                                                        <?php echo $cou_name_err; ?>
                                                    </span>
                                                    <label for="cou_name">Name</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mb-md-0">

                                                <input type="text" id="newpass" name="address"
                                                    placeholder="Address" input class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>">
                                                <span class="invalid-feedback">
                                                    <?php echo $address_err; ?>
                                                </span>
                                                <label for="address">City</label>
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <input type="text" id="state"
                                                        name="state" placeholder="State" input class="form-control <?php echo (!empty($cou_name_err)) ? 'is-invalid' : ''; ?>"
                                                        value="<?php echo $cou_name; ?>">
                                                    <span class="invalid-feedback">
                                                        <?php echo $cou_name_err; ?>
                                                    </span>
                                                    <div id="suggesstion-bo"></div>
                                                    <label for="state">State</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <input type="text" id="country"
                                                        name="country" placeholder="Country" input class="form-control <?php echo (!empty($cou_name_err)) ? 'is-invalid' : ''; ?>"
                                                        value="<?php echo $cou_name; ?>">
                                                    <span class="invalid-feedback">
                                                        <?php echo $cou_name_err; ?>
                                                    </span>
                                                    <div id="suggesstion-box"></div>
                                                    <label for="country">Country</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <input type="email" id="mail_id"
                                                        name="mail_id" placeholder="E-mail" input class="form-control <?php echo (!empty($mail_id_err)) ? 'is-invalid' : ''; ?>"
                                                        value="<?php echo $mail_id; ?>">
                                                    <span class="invalid-feedback">
                                                        <?php echo $mail_id_err; ?>
                                                    </span>
                                                    <label for="mail_id">E-mail</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <input type="date" id="dob" name="dob"
                                                        placeholder="Date of birth" input class="form-control <?php echo (!empty($dob_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dob; ?>">
                                                    <span class="invalid-feedback">
                                                        <?php echo $dob_err; ?>
                                                    </span>
                                                    <label for="dob">Date of birth</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="date" id="doa" name="doa"
                                                        placeholder="Date of anniversary" input class="form-control <?php echo (!empty($doa_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $doa; ?>">
                                                    <span class="invalid-feedback">
                                                        <?php echo $doa_err; ?>
                                                    </span>
                                                    <label for="doa">Date of anniversary</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-auto">
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                                <a href="addcus.php" class="btn btn-secondary ml-2">Cancel</a>
                                            </div>
                                        </div>

                                    </div>
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
            <?php include("footer.php"); ?>
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
