<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Update Associate</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>


<?php
// Include config file
require_once "config.php";
require_once "navbar.php";
// Define variables and initialize with empty values
$cou_name_err = "";
$param_name = "" ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["inputexc"])) {
        $cou_name_err = "Enter updated Product Name";
    }


// Processing form data when form is submitted
if (!empty($_POST["inputexc"])) {

    
        // Prepare an update statement
        $sql = "UPDATE product SET name=? WHERE id=?";


        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_name, $param_id);

            // Set parameters
            $param_id = $_POST["uid"];
            $param_name = $_POST["inputexc"];


            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                logActivity('Update', 'Product', 'Update Product Name ' . $param_name .' by '.  $_SESSION["username"] , $_SESSION["id"] );    
                echo '<script type="text/javascript">
				location.replace("prodread.php");
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
        $sql = "SELECT * FROM product WHERE id = ?";
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
                    $name = $row["name"];
                    
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
                        <div class="col-lg-6">
                            <div class="card shadow-lg bg-info text-white border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light text-info my-4">Update Product Detail
                                    </h3>
                                </div>
                                <div class="card-body">


                                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>"
                                        method="post">
                                        <input type="hidden" name="uid" class="form-control" id="uid"
                                            value="<?php echo trim($_GET["uid"]); ?>">

                                            <div class="form-group">
                                            <div class="row mb-3">
                                                    <div class="form-floating text-black mb-3 mb-md-0"> 
                                                    <input type="text" id="oldname" name="oldname"  class="form-control" value="<?php echo $name; ?>" readonly>
                                                        <label for="mob">Product Name</label>
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                            <div class="row mb-3">
                                                    <div class="form-floating mb-3 text-black mb-md-0">
                                                    <input type="text" id="inputexc" name="inputexc"  class="form-control  <?php echo (!empty($cou_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $param_name; ?>">
                                                    <span class="invalid-feedback"><?php echo $cou_name_err;?></span>
                                                        <label for="inputexc">Update Product Name</label>
                                                    
                                                </div>
                                            </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript"></script>






</body>

</html>