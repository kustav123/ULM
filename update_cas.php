<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Update Customer</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>


<?php
// Include config file
require_once "config.php";
require_once "navbar.php";
// Define variables and initialize with empty values
$cou_name = $dob = $address = $code = $mobile_no = $mail_id = $doa = "";
$cou_name_err = $address_err = $mobile_no_err = $mail_id_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["mobile_no"])) {
        $cou_name_err = "Enter updated Customer Name";
    }


// Processing form data when form is submitted
if (!empty($_POST["mobile_no"])) {

    
        // Prepare an update statement
        $sql = "UPDATE coustomeradd SET cou_name=?, address=?, state=?, country=?, mail_id=?, dob=?, doa=? WHERE id=?";


        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssi", $param_cou_name, $param_address, $param_state, $param_country, $param_mail_id, $param_dob, $param_doa, $param_id);

            // Set parameters
            $param_id = $_POST["uid"];
            $param_cou_name = $_POST["cou_name"];
            $param_address = $_POST["address"];
            $param_state = $_POST["state"];
            $param_country = $_POST["country"];
            $param_mail_id = $_POST["mail_id"];
            $param_dob = $_POST["dob"];
            $param_doa = $_POST["doa"];


            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                logActivity('Update', 'Customer', 'Update Customer Detail ' . $param_cou_name .' by '.  $_SESSION["username"] , $_SESSION["id"] );    

                // Records updated successfully. Redirect to landing page
                echo '<script type="text/javascript">
				location.replace("cad.php");
			  </script>';
              // Close statement
    mysqli_stmt_close($stmt);


    // Close connection
    mysqli_close($link);  
              exit();

            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        // mysqli_stmt_close($stmt);
    }
}
    if(isset($_GET["uid"]) && !empty(trim($_GET["uid"]))){
        // Get URL parameter
        $id =  trim($_GET["uid"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM coustomeradd WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $cou_name = $row["cou_name"];
                    $mobile_no = $row["mobile_no"];
                    $address = $row["address"];
                    $state = $row["state"];
                    $country = $row["country"];
                    $mail_id = $row["mail_id"];
                    $dob = $row["dob"];
                    $doa = $row["doa"];
                    
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }
    

?>


<body>


    <div id="layoutSidenav_content">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card shadow-lg bg-info text-white border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light">Edit Customer</h3>
                                </div>
                                <div class="card-body text-black">

                                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>"
                                        method="post">

                                        <input type="hidden" name="uid" class="form-control" id="uid"
                                            value="<?php echo trim($_GET["uid"]); ?>">

                                        <div class="form-group">

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">

                                                        <input type="text" id="mobile_no" name="mobile_no"
                                                            placeholder="Mobile" input
                                                            class="form-control <?php echo (!empty($mobile_no_err)) ? 'is-invalid' : ''; ?>"
                                                            value="<?php echo $mobile_no; ?>" readonly>
                                                        <span class="invalid-feedback">
                                                            <?php echo $mobile_no_err; ?>
                                                        </span>
                                                        <label for="mobile_no">Mobile</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">

                                                        <input type="text" id="cou_name" name="cou_name"
                                                            placeholder="Name" input
                                                            class="form-control <?php echo (!empty($cou_name_err)) ? 'is-invalid' : ''; ?>"
                                                            value="<?php echo $cou_name; ?>">
                                                        <span
                                                            class="invalid-feedback"><?php echo $cou_name_err;?></span>
                                                        <label for="cou_name">Name</label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <div class="col-md-4">

                                                    <div class="form-floating mb-3 mb-md-0">

                                                        <input type="text" id="address" name="address"
                                                            placeholder="Address" input
                                                            class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"
                                                            value="<?php echo $address; ?>">
                                                        <span
                                                            class="invalid-feedback"><?php echo $address_err; ?></span>
                                                        <label for="address">City</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <input type="text" id="state" name="state"
                                                            placeholder="State" input
                                                            class="form-control <?php echo (!empty($state_err)) ? 'is-invalid' : ''; ?>"
                                                            value="<?php echo $state; ?>">
                                                            <span
                                                            class="invalid-feedback"><?php echo $state_err; ?></span>
                                                        <label for="state">State name</label>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <input type="text" id="country" name="country"
                                                            placeholder="Country" input
                                                            class="form-control <?php echo (!empty($country_err)) ? 'is-invalid' : ''; ?>"
                                                            value="<?php echo $country; ?>">
                                                            <span
                                                            class="invalid-feedback"><?php echo $country_err; ?></span>
                                                        <label for="country">Country</label>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">

                                                        <input type="email" id="mail_id" name="mail_id"
                                                            placeholder="E-mail" input
                                                            class="form-control <?php echo (!empty($mail_id_err)) ? 'is-invalid' : ''; ?>"
                                                            value="<?php echo $mail_id; ?>">
                                                        <span class="invalid-feedback">
                                                            <?php echo $mail_id_err; ?>
                                                        </span>
                                                        <label for="mail_id">E-mail</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">

                                                        <input type="date" id="dob" name="dob"
                                                            placeholder="Date of birth" input
                                                            class="form-control <?php echo (!empty($dob_err)) ? 'is-invalid' : ''; ?>"
                                                            value="<?php echo $dob; ?>">
                                                        <span class="invalid-feedback">
                                                            <?php echo $dob_err; ?>
                                                        </span>
                                                        <label for="dob">Date of birth</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="date" id="doa" name="doa"
                                                            placeholder="Date of anniversary" input
                                                            class="form-control <?php echo (!empty($doa_err)) ? 'is-invalid' : ''; ?>"
                                                            value="<?php echo $doa; ?>">
                                                        <span class="invalid-feedback">
                                                            <?php echo $doa_err; ?>
                                                        </span>
                                                        <label for="doa">Date of anniversary</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center mb-3">
                                               
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-md-auto">
                                                    <input type="submit" class="btn btn-primary" value="Submit">
                                                    <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript"></script>






</body>

</html>