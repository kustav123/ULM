<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
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
                    <!-- #region -->



                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <a href="https://www.example.com" style="text-decoration: none; color: white;"> </a>
                            <div class="card-body">Customer Inside store now</div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-center flex-row">
                                    <div class="col-md-2 d-flex align-items-center justify-content-between"> HYD
                                        <?php
                                    // Include config file
                                    require_once "config.php";
                                    error_reporting(E_ALL);
                                    ini_set('display_errors',1);

                                    // Define variables and initialize with empty values 
                                    $sqle = "SELECT count(*) FROM castin WHERE store = 'HYD'";
                                    $resulte = $link->query($sqle);

                                    $row = $resulte->fetch_array();
                                    $count = $row[0];

                                    echo '<div class="big text-white">' . $count . '</i></div>';
                                ?>
                                    </div>


                                    <div class="col-md-2 d-flex align-items-center justify-content-between"> VIZ
                                        <?php
                                    // Include config file
                                    require_once "config.php";
                                    error_reporting(E_ALL);
                                    ini_set('display_errors',1);

                                    // Define variables and initialize with empty values 
                                    $sqle = "SELECT count(*) FROM castin WHERE store = 'VIZ'";
                                    $resulte = $link->query($sqle);

                                    $row = $resulte->fetch_array();
                                    $count = $row[0];

                                    echo '<div class="big text-white">' . $count . '</i></div>';
                                ?>
                                    </div>

                                    <div class="col-md-2 d-flex align-items-center justify-content-between"> BZA
                                        <?php
                                    // Include config file
                                    require_once "config.php";
                                    error_reporting(E_ALL);
                                    ini_set('display_errors',1);

                                    // Define variables and initialize with empty values 
                                    $sqle = "SELECT count(*) FROM castin WHERE store = 'BZA'";
                                    $resulte = $link->query($sqle);

                                    $row = $resulte->fetch_array();
                                    $count = $row[0];

                                    echo '<div class="big text-white">' . $count . '</i></div>';
                                ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Number of visit today</div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-center flex-row">
                                    <div class="col-md-2 d-flex align-items-center justify-content-between"> HYD
                                        <?php
                                    // Include config file
                                    require_once "config.php";
                                    error_reporting(E_ALL);
                                    ini_set('display_errors',1);

                                    // Define variables and initialize with empty values 
                                    $sqle = "SELECT count(actid) FROM act where  date(date) = curdate() AND store = 'HYD'";
                                    $resulte = $link->query($sqle);

                                    $row = $resulte->fetch_array();
                                    $count = $row[0];

                                    echo '<div class="big text-white">' . $count . '</i></div>';
                                ?>
                                    </div>

                                    <div class="col-md-2 d-flex align-items-center justify-content-between"> VIZ
                                        <?php
                                    // Include config file
                                    require_once "config.php";
                                    error_reporting(E_ALL);
                                    ini_set('display_errors',1);

                                    // Define variables and initialize with empty values 
                                    $sqle = "SELECT count(actid) FROM act where  date(date) = curdate() AND store = 'VIZ'";
                                    $resulte = $link->query($sqle);

                                    $row = $resulte->fetch_array();
                                    $count = $row[0];

                                    echo '<div class="big text-white">' . $count . '</i></div>';
                                ?>
                                    </div>

                                    <div class="col-md-2 d-flex align-items-center justify-content-between"> BZA
                                        <?php
                                    // Include config file
                                    require_once "config.php";
                                    error_reporting(E_ALL);
                                    ini_set('display_errors',1);

                                    // Define variables and initialize with empty values 
                                    $sqle = "SELECT count(actid) FROM act where  date(date) = curdate() AND store = 'BZA'";
                                    $resulte = $link->query($sqle);

                                    $row = $resulte->fetch_array();
                                    $count = $row[0];

                                    echo '<div class="big text-white">' . $count . '</i></div>';
                                ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Number of walkout today</div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-center flex-row">
                                    <div class="col-md-2 d-flex align-items-center justify-content-between"> HYD
                                        <?php
                                    // Include config file
                                    require_once "config.php";
                                    error_reporting(E_ALL);
                                    ini_set('display_errors',1);

                                    // Define variables and initialize with empty values 
                                    $sqle = "SELECT count(actid) FROM act where  date(date) = curdate() and walkout = 'Yes' AND store = 'HYD'";
                                    $resulte = $link->query($sqle);

                                    $row = $resulte->fetch_array();
                                    $count = $row[0];

                                    echo '<div class="big text-white">' . $count . '</i></div>';
                                ?>
                                    </div>

                                    <div class="col-md-2 d-flex align-items-center justify-content-between">VIZ
                                        <?php
                                    // Include config file
                                    require_once "config.php";
                                    error_reporting(E_ALL);
                                    ini_set('display_errors',1);

                                    // Define variables and initialize with empty values 
                                    $sqle = "SELECT count(actid) FROM act where  date(date) = curdate() and walkout = 'Yes' AND store = 'VIZ'";
                                    $resulte = $link->query($sqle);

                                    $row = $resulte->fetch_array();
                                    $count = $row[0];

                                    echo '<div class="big text-white">' . $count . '</i></div>';
                                ?>
                                    </div>

                                    <div class="col-md-2 d-flex align-items-center justify-content-between">BZA
                                        <?php
                                    // Include config file
                                    require_once "config.php";
                                    error_reporting(E_ALL);
                                    ini_set('display_errors',1);

                                    // Define variables and initialize with empty values 
                                    $sqle = "SELECT count(actid) FROM act where  date(date) = curdate() and walkout = 'Yes' AND store = 'BZA'";
                                    $resulte = $link->query($sqle);

                                    $row = $resulte->fetch_array();
                                    $count = $row[0];

                                    echo '<div class="big text-white">' . $count . '</i></div>';
                                ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- ==================================monthly count=========================== -->
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="panel text-center">
                            <div class="stats-item" style="background-color: #00AABF">
                                <i style="background-color: #00AABF" class="fa fa-line-chart bigicon"></i>
                            </div>
                            <div style="background-color: #00BCD4" class="stats-item">
                                <div class="header-item">Visits</div>
                                <div class="data-item">175,773</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 mb-3">
                        <div class="panel text-center">
                            <div class="stats-item" style="background-color: #7DB043">
                                <i style="background-color: #7DB043" class="fa fa-eye bigicon"></i>
                            </div>
                            <div style="background-color: #8BC34A" class="stats-item">
                                <div class="header-item">Impressions</div>
                                <div class="data-item">975,112</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 mb-3 mx-1">
                        <div class="panel text-center">
                            <form>
                                <div class="stats-item row" style="background-color: #E68900">
                                    <div class="col-md-2" style="background-color: #E68900">
                                        <i style="background-color: #E68900" class="fas fa-chart-area me-1"></i>
                                    </div>

                                    <div class="stats-item col-md-5">

                                        <select id="daylimit" name="daylimit" class="form-control">
                                            <option value="7">This Month</option>
                                            <option value="15">Last Month</option>
                                            <option value="30">Last 30 days</option>
                                        </select>
                                    </div>
                                    <div class="stats-item col-md-5">
                                        <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqln = "SELECT  strid, strname FROM store";
                                                 $resultn = $link->query($sqln);
                                                 // Create dropdown
                                                 echo '<select id="store" name="store" class="form-control">';
                                                 while($row = $resultn ->fetch_assoc()) {
                                                     echo '<option value="' . $row['strid'] . '">' . $row['strname'] . '</option>';
                                                 }
                                                 echo '</select>';
 
                                                 ?>
                                    </div>
                                </div>
                            </form>


                            <div style="background-color: #FF9800" class="row stats-item">
                                <div class="header-item">Comments</div>
                                <div class="data-item">124,554</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-12 mb-3 mx-1">
                        <div class="panel text-center">
                            <form>
                                <div class="stats-item row" style="background-color: #57717D">


                                    <div class="col-md-2" style="background-color: #57717D">
                                        <i style="background-color: #57717D" class="fa fa-cloud-download bigicon"></i>
                                    </div>

                                    <div class="stats-item col-md-5">

                                        <select id="daylimit" name="daylimit" class="form-control">
                                            <option value="7">This Month</option>
                                            <option value="15">Last Month</option>
                                            <option value="30">Last 30 days</option>
                                        </select>
                                    </div>
                                    <div class="stats-item col-md-5">
                                        <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqln = "SELECT  strid, strname FROM store";
                                                 $resultn = $link->query($sqln);
                                                 // Create dropdown
                                                 echo '<select id="store" name="store" class="form-control">';
                                                 while($row = $resultn ->fetch_assoc()) {
                                                     echo '<option value="' . $row['strid'] . '">' . $row['strname'] . '</option>';
                                                 }
                                                 echo '</select>';
 
                                                 ?>
                                    </div>

                                </div>
                            </form>


                            <div style="background-color: #607D8B" class="row stats-item">
                                <div class="header-item">Service & Repair</div>
                                <div class="data-item">11,745</div>
                            </div>
                        </div>
                    </div>




                    <!-- ======================================monthly end ================-->




                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header text-white">


                                    <i class="fas fa-chart-area me-1"></i>
                                    Customer visit

                                    <form>
                                        <div class="d-flex flex-row-reverse">
                                            <div class="p-2">
                                                <select id="daylimit" name="daylimit" class="form-control">
                                                    <option value="7">Last 7 days</option>
                                                    <option value="15">Last 15 days</option>
                                                    <option value="30">Last 30 days</option>
                                                </select>
                                            </div>
                                            <div class="p-2">
                                                <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqln = "SELECT  strid, strname FROM store";
                                                 $resultn = $link->query($sqln);
                                                 // Create dropdown
                                                 echo '<select id="store" name="store" class="form-control">';
                                                 while($row = $resultn ->fetch_assoc()) {
                                                     echo '<option value="' . $row['strid'] . '">' . $row['strname'] . '</option>';
                                                 }
                                                 echo '</select>';
 
                                                 ?>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <canvas id="myAreaChart" width="100%" height="15"></canvas>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header text-white">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Happy vs UnHappy
                                    <form>
                                        <div class="d-flex flex-row-reverse">
                                            <div class="p-2">
                                                <select id="daylimitx" name="daylimitx" class="form-control">
                                                    <option value="7">Last 7 days</option>
                                                    <option value="15">Last 15 days</option>
                                                    <option value="30">Last 30 days</option>
                                                </select>
                                            </div>
                                            <div class="p-2">
                                                <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqln = "SELECT  strid, strname FROM store";
                                                 $resultn = $link->query($sqln);
                                                 // Create dropdown
                                                 echo '<select id="storex" name="storex" class="form-control">';
                                                 while($row = $resultn ->fetch_assoc()) {
                                                     echo '<option value="' . $row['strid'] . '">' . $row['strname'] . '</option>';
                                                 }
                                                 echo '</select>';

                                                 ?>


                                                <!-- <option value="HYD">Hyderabad</option>
                                                        <option value="VIJ">Vijayawada</option> -->

                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <canvas id="myBarChart" width="100%" height="15"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
        </main>
        <?php include("footer.php"); ?>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>