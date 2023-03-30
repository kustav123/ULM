<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sale Start</title>
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
    

    
        $cou_id = trim($_POST["id"]);
        $name = trim($_POST["name"]);
        $tgi = trim($_POST["tgi"]); 
        $thc = trim($_POST["thc"]); 
        $type = trim($_POST["type"]);

        
    
    
    
    // Check input errors before inserting in database
    if(empty($cou_mob_err) && empty($cou_time_err) ){
        
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
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
       
    }
  }
    // Close connection
    mysqli_close($link);


?>

        <div id="layoutSidenav_content">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg text-white bg-info border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light text-info my-4">Entry Time</h3></div>
                                    <div class="card-body">
                                        
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
                                          <input type="hidden" name="id" class="form-control" id="id" >

                                             <div class="row">
                                                <div class="col">
                                                   <label for="inputmob">Mobile</label>
                                                   <input type="text" class="form-control <?php echo (!empty($cou_mob_err)) ? 'is-invalid' : ''; ?>" id="inputmob" value="<?php echo $inputmob; ?>"  name="inputmob" >
                                                   <span class="invalid-feedback"><?php echo $cou_mob_err;?></span>

                                                </div>
                                                <div class="col">
                                                  <label for="name">Name</label>
                                                  <input type="text" class="form-control" id="name" name="name" readonly>
                                                </div>
                                             </div>

                                          <div class="row">
                                            <div class="col">
                                                 <label for="tgi">Total group ins</label>
                                                 <select id="tgi" class="form-control" name='tgi'>
                                                 <option selected>1</option>
                                                 <option>2</option>
                                                 </select>
                                            </div>
                                              
                                            <div class="col">
                                              <label for="thc">Total head count</label>
                                              <input type="number" class="form-control" id="thc" placeholder="1" name= 'thc'>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <div class="col">
                                                <label for="time">Entry Time</label>
                                                <input type="time" class="form-control <?php echo (!empty($cou_time_err)) ? 'is-invalid' : ''; ?>" id="time" name='time'>
                                                <span class="invalid-feedback"><?php echo $cou_time_err;?></span>

                                              </div>
                                              <div class="col">
                                                   <label for="type">Type</label>
                                                   <select id="type" class="form-control" name='type'>
                                                   <option selected>Gold</option>
                                                   <option>Diamond</option>
                                                   <option>Silver</option>
                                                   </select>
                                                 </div>
                                            </div>
                                        </br>

                                         <input type="submit" class="btn btn-primary" value="Submit" id="submit-btn">
                                         <a href="in.php" class="btn btn-secondary ml-2">Cancel</a>
                      

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
        window.location.href = "addcus.php?mob=" + mobile;
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
                        

 