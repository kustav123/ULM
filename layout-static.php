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


                                            <div class="card shadow-lg text-white bg-info border-0 rounded-lg mt-3">
                                                <div class="card-header">
                                                    <h3 class="text-center font-weight-light text-info my-4">View Sales
                                                        Report</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form action=./read.php method="post">

                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <label>From</label>
                                                                <input type="date" name="from" class="form-control">
                                                            </div>
                                                            <label>To</label>
                                                            <input type="date" name="to" class="form-control">
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

                                            <div class="card shadow-lg text-white bg-info border-0 rounded-lg mt-3">
                                                <div class="card-header">
                                                    <h3 class="text-center font-weight-light text-info my-4">View
                                                        Sammary
                                                        Report</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form action=./read.php method="post">

                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <label>From</label>
                                                                <input type="date" name="froms" class="form-control">
                                                            </div>
                                                            <label>To</label>
                                                            <input type="date" name="tos" class="form-control">
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



                                            <div class="card shadow-lg text-white bg-info border-0 rounded-lg mt-2">
                                                <div class="card-header">
                                                    <h3 class="text-center font-weight-light text-info my-4">Sales
                                                        Person
                                                        Report</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form action=./read.php method="post">

                                                        <div class="row">
                                                            <div class="col">
                                                                <label>Sales executive</label>
                                                                <?php
                                                                // Include config file
                                                                require_once "config.php";
                                                                error_reporting(E_ALL);
                                                                ini_set('display_errors', 1);
                                                                // Define variables and initialize with empty values 
                                                                $sqle = "SELECT id, name FROM executive where status = 1";
                                                                $resulte = $link->query($sqle);

                                                                // Create dropdown
                                                                echo '<select name="executive" class="form-control" id="executive" placeholder="executive">';
                                                                while ($row = $resulte->fetch_assoc()) {
                                                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                                }
                                                                echo '</select>';


                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label>Date From</label>
                                                                <input type="date" name="froma" class="form-control">
                                                            </div>
                                                            <div class="col">
                                                                <label>Date To</label>
                                                                <input type="date" name="toa" class="form-control">
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

                                            <div class="card shadow-lg text-white bg-info border-0 rounded-lg mt-2">
                                                <div class="card-header">
                                                    <h3 class="text-center font-weight-light text-info my-4">Follow up
                                                        Report</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form action=./read.php method="post">

                                                        <div class="row">
                                                            <div class="col">
                                                                <label>Date From</label>
                                                                <input type="date" name="rfd" class="form-control">
                                                            </div>
                                                            <div class="col">
                                                                <label>Date To</label>
                                                                <input type="date" name="rtd" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="tgi">Report By</label>
                                                                <select id="rtyp" class="form-control" name='rtyp'>
                                                                    <option value="1" selected>Created</option>
                                                                    <option value="2">Closed</option>
                                                                    <option value="3">Open,Last activity</option>
                                                                </select>
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
                                    <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#follow-five" aria-expanded="false"
                                            aria-controls="flush-collapseFour">
                                            View Cumulative report
                                        </button>
                                    </h2>
                                    <div id="follow-five" class="accordion-collapse collapse "
                                        aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">

                                            <div class="card shadow-lg text-white bg-info border-0 rounded-lg mt-3">
                                                <div class="card-header">
                                                    <h3 class="text-center font-weight-light text-info my-4">View Cumulative report</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form action=./read.php method="post">

                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <label>From</label>
                                                                <input type="date" name="cdate" class="form-control">
                                                            </div>
                                                            <label>To</label>
                                                            <input type="date" name="csdate" class="form-control">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>