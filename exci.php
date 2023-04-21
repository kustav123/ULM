<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Exhibitions</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<?php 

// Include config file
require_once "config.php";
require_once "navbar.php";
error_reporting(E_ALL);
ini_set('display_errors',1);
// Define variables and initialize with empty values

$inputmob =  "";

if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["mob"])){
  
$inputmob = trim($_GET["mob"]) ;
  
}
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_cou_mob = trim($_POST["inputmob"]);
    $input_cou_time = trim($_POST["time"]);
    $input_cou_name = trim($_POST["name"]);
    if(empty($input_cou_mob)){
        $cou_mob_err = "PLease fill the required information";
    } else {
      $inputmob  = $input_cou_mob ;

    }
     
    if(empty($input_cou_time)){
      $cou_time_err = "PLease fill the required information";
    }else {
      $time = $input_cou_time ;

    }
    if(empty($input_cou_name)){
      $name_err = "Please click on the text box to autofill the name";
    }else {
      $name = $input_cou_name ;

    }
  
        $cou_id = trim($_POST["id"]);
        $tgi = trim($_POST["tgi"]); 
        $thc = trim($_POST["thc"]); 
        $type = trim($_POST["type"]);

    // Check input errors before inserting in database
    if(empty($cou_mob_err) && empty($cou_time_err) && empty($name_err)){
        
        $sql = "INSERT INTO `castin` ( `mob`, `name`, `tgi`, `thc`, `type`, `time`, `cou_id`) VALUES (?, ?, ?, ?, ?, ?, ?)" ;
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $inputmob  , $name, $tgi, $thc, $type, $time, $cou_id);
            // mysqli_stmt_bind_param($stmt, "ssssss",$fm, $advance, $orderst, $walkout, $reason, $conversion, );

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                logActivity('Add', 'InCustomer', 'Customer entry ' . $name .' by '.  $_SESSION["username"] , $_SESSION["id"] );

                echo '<script type="text/javascript">
				location.replace("in.php");
			  </script>';
        mysqli_stmt_close($stmt);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
       
    }
    mysqli_close($link);

  }
    // Close connection


?>
<div id="layoutSidenav_content">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-lg bg-info text-white border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light">Exhibitions Detail</h3>
                            </div>
                            <div class="card-body text-black">

                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                                    onsubmit="return validateForm()">
                                    <input type="hidden" name="id" class="form-control" id="id">

                                    <div class="form-group">

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <input type="text" id="inputmob" name="inputmob"
                                                        placeholder="Mobile" input
                                                        class="form-control <?php echo (!empty($cou_mob_err)) ? 'is-invalid' : ''; ?>"
                                                        value="<?php echo $inputmob; ?>">
                                                    <span class="invalid-feedback">
                                                        <?php echo $cou_mob_err;?>
                                                    </span>
                                                    <label for="inputmob">Mobile</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <input type="text" id="name" name="name" placeholder="Name" input
                                                        class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>"
                                                        readonly>
                                                    <span class="invalid-feedback"><?php echo $name_err;?></span>
                                                    <label for="name">Name</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <div class="col-md-4">

                                                <div class="form-floating mb-3 mb-md-0">

                                                    <input type="text" id="address" name="address" placeholder="Address"
                                                        input
                                                        class="form-control">
                                                    <span class="invalid-feedback"></span>
                                                    
                                                    <label for="address">Sales Executive</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="text" id="state" name="state" placeholder="State" input
                                                        class="form-control">
                                                    <span class="invalid-feedback"></span>
                                                    
                                                    <label for="state">Helper</label>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="text" id="country" name="country" placeholder="Country"
                                                        input
                                                        class="form-control">
                                                    <span class="invalid-feedback"></span>
                                                    <label for="country">Product</label>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                <?php
                                                    // Include config file
                                                    require_once "config.php";
                                                    error_reporting(E_ALL);
                                                    ini_set('display_errors', 1);
                                                    // Define variables and initialize with empty values 
                                                    $sqle = "SELECT country_name FROM country where status = 1";
                                                    $resulte = $link->query($sqle);

                                                    // Create dropdown
                                                    echo '<select name="country" class="form-control" id="country" placeholder="Country">';
                                                    while ($row = $resulte->fetch_assoc()) {
                                                        echo '<option value="' . $row['country_name'] . '">' . $row['country_name'] . '</option>';
                                                    }
                                                    echo '</select>';


                                                    ?>
                                                    <label for="Store">Store</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <input type="text" id="dob" name="dob" placeholder="Customer Feedback"
                                                        input
                                                        class="form-control">
                                                    <span class="invalid-feedback"></span>
                                                    <label for="dob">Customer Feedback</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="text" id="doa" name="doa"
                                                        placeholder="Conversion" input
                                                        class="form-control">
                                                    <span class="invalid-feedback"></span>
                                                    <label for="doa">Conversion</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                        <div class="col-md-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="date" id="doa" name="doa"
                                                        placeholder="Date of Visit" input
                                                        class="form-control">
                                                    <span class="invalid-feedback"></span>
                                                    <label for="doa">Date of Visit</label>
                                                </div>
                                            </div>
                                            </div>
                                        
                                        <div class="row justify-content-center mb-3">

                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-auto">
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                                <a href="cad.php" class="btn btn-secondary ml-2">Cancel</a>
                                            </div>
                                        </div>

                                    </div>
                                </form>

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
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript">
document.getElementById("inputmob").addEventListener("blur", function() {
  var mobile = document.getElementById("inputmob").value;
  var submitBtn = document.querySelector('input[type="submit"]');

  // make an AJAX request to a PHP script that queries the database to retrieve the name and address corresponding to the mobile number
  if (mobile.trim() != "") {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // when the AJAX request is complete, update the name and address fields in the form with the data returned by the PHP script
      var data = JSON.parse(this.responseText);
      if (data.name == "No Data") {
        // if the response indicates no data, redirect to add.php
        window.location.href = "addcus.php?type=ex&mob=" + mobile;
      } else if (data.status == "in") {
        // if the response indicates that the customer is already inside the store, display an error message and disable the submit button
        var errorText = document.createElement("span");
        errorText.textContent = "Customer is already inside the store!";
        errorText.style.color = "red";
        var parentElement = document.getElementById("inputmob").parentNode;
        parentElement.insertBefore(errorText, parentElement.lastChild);
        submitBtn.disabled = true;
        document.getElementById("name").value = "";
      } else {
        // if data is available, update the name and address fields in the form
        document.getElementById("name").value = data.name;
        document.getElementById("id").value = data.id;
        var existingError = document.querySelector("#inputmob + span");
        if (existingError) {
          existingError.remove();
        }
        submitBtn.disabled = false;
      }
    }
  };
  xhttp.open("GET", "ajax.php?qr=" + mobile, true);
  xhttp.send();
} else {
    // mobile field is blank, do nothing
  }
});
</script>


    </body>
</html>
                        
