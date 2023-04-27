<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sales Report</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- for multi dropdown -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/multidrop.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<body>


    <?php
   require_once "navbar.php";
    ?>







    <div id="layoutSidenav_content">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 mt-5">

                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">

                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#follow-one" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
                                            View Sales Report
                                        </button>
                                    </h2>

                                    <div id="follow-one" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">


                                            <div class="card shadow-lg bg-info text-white border-0 rounded-lg">
                                                <div class="card-header">
                                                    <h3 class="text-center font-weight-light">View Sales
                                                        Report</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form action=./read.php method="post">

                                                        <div class="form-group">
                                                            <div class="row mb-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">

                                                                        <input type="date" id="from" name="from"
                                                                            placeholder="From" input
                                                                            class="form-control">
                                                                        <label>From</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">
                                                                        <input type="date" id="to" name="to"
                                                                            placeholder="To" input class="form-control">
                                                                        <label>To</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                <div class="form-floating mb-3 mb-md-0"><strong class="sl">Select Store:</strong>
                                                                    <button class="btn btn-secondary" type="button">
                                                                        <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqln = "SELECT  strid, strname FROM store";
                                                 $resultn = $link->query($sqln);
                                                 // Create dropdown
                                                 echo '<select id="multiple-checkboxes" multiple="multiple" name="store[]" class="form-control">';
                                                 while($row = $resultn ->fetch_assoc()) {
                                                     echo '<option value="' . $row['strid'] . '">' . $row['strname'] . '</option>';
                                                 }
                                                 echo '</select>';
 
                                                 ?>
                                                 
                                                 </button>
                                                 </div>
                                                       </div>
                                                            </div>

                                                            </br><input type="submit" class="btn btn-primary"
                                                                value="Submit">
                                                            <a href="layout-static.php"
                                                                class="btn btn-secondary ml-2">Cancel</a>
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

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#follow-two" aria-expanded="false"
                                            aria-controls="flush-collapseTwo">
                                            View Sammary Report
                                        </button>
                                    </h2>
                                    <div id="follow-two" class="accordion-collapse collapse "
                                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">

                                            <div class="card shadow-lg bg-info text-white border-0 rounded-lg">
                                                <div class="card-header">
                                                    <h3 class="text-center font-weight-light">View
                                                        Sammary
                                                        Report</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form action=./read.php method="post">

                                                        <div class="form-group">
                                                            <div class="row mb-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">

                                                                        <input type="date" id="froms" name="froms"
                                                                            placeholder="From" input
                                                                            class="form-control">
                                                                        <label>From</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">
                                                                        <input type="date" id="tos" name="tos"
                                                                            placeholder="To" input class="form-control">
                                                                        <label>To</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                            <div class="col-md-6">
                                                                <strong class="sl">Select Store:</strong>
                                                                <button class="btn btn-info" type="button">
                                                                <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqln = "SELECT  strid, strname FROM store";
                                                 $resultn = $link->query($sqln);
                                                 // Create dropdown
                                                 echo '<select id="selectpicker" name="store[]" class="selectpicker" multiple data-live-search="true">';
                                                 while($row = $resultn ->fetch_assoc()) {
                                                     echo '<option value="' . $row['strid'] . '">' . $row['strname'] . '</option>';
                                                 }
                                                 echo '</select>';
 
                                                 ?>

                                                </button>
                                                </div>
                                                            </div>

                                                            </br><input type="submit" class="btn btn-primary"
                                                                value="Submit">
                                                            <a href="layout-static.php"
                                                                class="btn btn-secondary ml-2">Cancel</a>
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

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#follow-three"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Sales Person Report
                                        </button>
                                    </h2>
                                    <div id="follow-three" class="accordion-collapse collapse "
                                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">



                                            <div class="card shadow-lg bg-info text-white border-0 rounded-lg">
                                                <div class="card-header">
                                                    <h3 class="text-center font-weight-light">Sales
                                                        Person
                                                        Report</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form action=./read.php method="post">

                                                        <div class="form-group">
                                                            <div class="row mb-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">

                                                                        <input type="date" id="froma" name="froma" placeholder="From" input class="form-control">
                                                                        <label>Date From</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">
                                                                        <input type="date" id="toa" name="toa"
                                                                            placeholder="To" input class="form-control">
                                                                        <label>Date To</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">

                                                                        <?php
                                                                // Include config file
                                                                require_once "config.php";
                                                                error_reporting(E_ALL);
                                                                ini_set('display_errors', 1);
                                                                // Define variables and initialize with empty values 
                                                                $sqle = "SELECT id, name FROM executive where status = 1";
                                                                $resulte = $link->query($sqle);

                                                                // Create dropdown
                                                                echo '<select name="executive" input class="form-control" id="executive" placeholder="executive">';
                                                                while ($row = $resulte->fetch_assoc()) {
                                                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                                }
                                                                echo '</select>';


                                                                ?>
                                                                        <label>Sales executive</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6"> <label>Store</label>
                                                                    <div class="form-floating mb-3 mb-md-0">
                                                                    <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqln = "SELECT  strid, strname FROM store";
                                                 $resultn = $link->query($sqln);
                                                 // Create dropdown
                                                 echo '<select id="selectpicker" name="store[]" class="selectpicker" multiple data-live-search="true">';
                                                 while($row = $resultn ->fetch_assoc()) {
                                                     echo '<option value="' . $row['strid'] . '">' . $row['strname'] . '</option>';
                                                 }
                                                 echo '</select>';
 
                                                 ?>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            </br><input type="submit" class="btn btn-primary"
                                                                value="Submit">
                                                            <a href="index.php"
                                                                class="btn btn-secondary ml-2">Cancel</a>

                                                    </form>
                                                </div>
                                                <!-- <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div> -->
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#follow-four"
                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                            Follow up Report
                                        </button>
                                    </h2>
                                    <div id="follow-four" class="accordion-collapse collapse "
                                        aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">

                                            <div class="card shadow-lg bg-info text-white border-0 rounded-lg">
                                                <div class="card-header">
                                                    <h3 class="text-center font-weight-light">Follow up
                                                        Report</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form action=./read.php method="post">

                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                
                                                                <input type="date" name="rfd" input class="form-control">
                                                                <label>Date From</label>
                                                            </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                
                                                                <input type="date" name="rtd" input class="form-control">
                                                                <label>Date To</label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                
                                                                <select id="rtyp" input class="form-control" name='rtyp'>
                                                                    <option value="1" selected>Created</option>
                                                                    <option value="2">Closed</option>
                                                                    <option value="3">Open,Last activity</option>
                                                                </select>
                                                                <label for="tgi">Report By</label>
                                                                </div>
                                                                </div>

                                                                <div class="col-md-6"><label>Store</label>
                                                                <div class="form-floating mb-3 mb-md-0">
                                                                <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqln = "SELECT  strid, strname FROM store";
                                                 $resultn = $link->query($sqln);
                                                 // Create dropdown
                                                 echo '<select id="selectpicker" name="store[]" input class="selectpicker" multiple data-live-search="true">';
                                                 while($row = $resultn ->fetch_assoc()) {
                                                     echo '<option value="' . $row['strid'] . '">' . $row['strname'] . '</option>';
                                                 }
                                                 echo '</select>';
 
                                                 ?>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        </br><input type="submit" class="btn btn-primary"
                                                            value="Submit">
                                                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>

                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#follow-five"
                                            aria-expanded="false" aria-controls="flush-collapseFour">
                                            View Cumulative report
                                        </button>
                                    </h2>
                                    <div id="follow-five" class="accordion-collapse collapse "
                                        aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">

                                            <div class="card shadow-lg bg-info text-white border-0 rounded-lg">
                                                <div class="card-header">
                                                    <h3 class="text-center font-weight-light">View
                                                        Cumulative report</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form action=./read.php method="post">

                                                    <div class="row mb-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">

                                                                        <input type="date" id="cdate" name="cdate"
                                                                            placeholder="From" input
                                                                            class="form-control">
                                                                        <label>From</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">
                                                                        <input type="date" id="csdate" name="csdate"
                                                                            placeholder="To" input class="form-control">
                                                                        <label>To</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <div class="row">
                                                        <div class="col-md-6">
                                                                <strong class="sl">Select Store:</strong>
                                                                <button class="btn btn-info" type="button">
                                                                
                                                                
                                                                <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqln = "SELECT  strid, strname FROM store";
                                                 $resultn = $link->query($sqln);
                                                 // Create dropdown
                                                 echo '<select id="selectpicker" name="store[]" class="selectpicker" multiple data-live-search="true">';
                                                 while($row = $resultn ->fetch_assoc()) {
                                                     echo '<option value="' . $row['strid'] . '">' . $row['strname'] . '</option>';
                                                 }
                                                 echo '</select>';
 
                                                 ?>
                                                   </button>
                                                </div>
                                                            </div>


                                                        </br><input type="submit" class="btn btn-primary"
                                                            value="Submit">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>

    <script src="js1/jquery.min.js"></script>
    <script src="js1/popper.js"></script>
    <script src="js1/bootstrap.min.js"></script>
    <script src="js1/bootstrap-multiselect.js"></script>
    <script src="js1/main.js"></script>
    
</body>

</html>