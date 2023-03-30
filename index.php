
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
<body>
    <?php
require_once "navbar.php";

?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <!-- <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol> -->
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Total number of Customer</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                    // Include config file
                                    require_once "config.php";
                                    error_reporting(E_ALL);
                                    ini_set('display_errors',1);

                                    // Define variables and initialize with empty values 
                                    $sqle = "SELECT count(*) FROM coustomeradd";
                                    $resulte = $link->query($sqle);

                                    $row = $resulte->fetch_array();
                                    $count = $row[0];

                                    echo '<div class="big text-white">' . $count . '</i></div>';
                                ?>
                                    </div>
                                </div>
                                
                            </div>
                        
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Customer Inside store now</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                    // Include config file
                                    require_once "config.php";
                                    error_reporting(E_ALL);
                                    ini_set('display_errors',1);

                                    // Define variables and initialize with empty values 
                                    $sqle = "SELECT count(*) FROM castin";
                                    $resulte = $link->query($sqle);

                                    $row = $resulte->fetch_array();
                                    $count = $row[0];

                                    echo '<div class="big text-white">' . $count . '</i></div>';
                                ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Number of visit today</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                    // Include config file
                                    require_once "config.php";
                                    error_reporting(E_ALL);
                                    ini_set('display_errors',1);

                                    // Define variables and initialize with empty values 
                                    $sqle = "SELECT count(actid) FROM act where  date(date) = curdate()";
                                    $resulte = $link->query($sqle);

                                    $row = $resulte->fetch_array();
                                    $count = $row[0];

                                    echo '<div class="big text-white">' . $count . '</i></div>';
                                ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Number of walkout today</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                    // Include config file
                                    require_once "config.php";
                                    error_reporting(E_ALL);
                                    ini_set('display_errors',1);

                                    // Define variables and initialize with empty values 
                                    $sqle = "SELECT count(actid) FROM act where  date(date) = curdate() and walkout = 'Yes'";
                                    $resulte = $link->query($sqle);

                                    $row = $resulte->fetch_array();
                                    $count = $row[0];

                                    echo '<div class="big text-white">' . $count . '</i></div>';
                                ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header text-white">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Customer visit 
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="15"></canvas></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header text-white">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Billed Yes vs No 
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="15"></canvas></div>
                                </div>
                            </div>
                        </div>
                        
                                
                            
                    </div>
                </main>
                <?php include("footer.php"); ?>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
