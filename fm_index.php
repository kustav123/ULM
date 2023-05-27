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
 require_once "config.php";

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
                            <div class="card-body">Customer Inside store</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <?php
                                        // Include config file
                                        require_once "config.php";
                                        error_reporting(E_ALL);
                                        ini_set('display_errors', 1);

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
                            <div class="card-body">Number Of Walkins</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <?php
                                        // Include config file
                                        require_once "config.php";
                                        error_reporting(E_ALL);
                                        ini_set('display_errors', 1);

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
                            <div class="card-body">Number Of Walkins</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <?php
                                        // Include config file
                                        require_once "config.php";
                                        error_reporting(E_ALL);
                                        ini_set('display_errors', 1);

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


                <!-------------- Table Start =================-->
                <div class="row">


                    <div class="col">
                        <h4>Customer Details Inside Store</h4>


                        <?php
                          // Include config file


                             // Define query
                             $sql = "SELECT name, mob, type, time FROM castin WHERE store = '{$_SESSION["store"]}'";

                        // Execute query and get results
                         $result = $link->query($sql);

                        // Display results in a table
                        echo '<table class="table table-bordered table-hover">';
                        echo '<thead class="thead-info">';
                        echo '<tr>';
                        echo '<th scope="col">ID</th>';
                        echo '<th scope="col">Name</th>';
                        echo '<th scope="col">Mobile</th>';
                        echo '<th scope="col">Type</th>';
                        echo '<th scope="col">Time</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                    if ($result->num_rows > 0) {
                    $i = 1;
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<th scope="row">' . $i . '</th>';
                        echo '<td>' . $row["name"] . '</td>';
                        echo '<td>' . $row["mob"] . '</td>';
                        echo '<td>' . $row["type"] . '</td>';
                        echo '<td>' . $row["time"] . '</td>';
                        echo '</tr>';
                      $i++;
                     }
                  } else {
                    echo '<tr><td colspan="5">No records found.</td></tr>';
                      }
                         echo '</tbody>';
                          echo '</table>';
                        ?>

                    </div>






                    <div class="col">
                    <h4>Walkin Customer Details</h4>
                                        <?php
// Include config file


// Define query
$sql = "SELECT c.cou_name as name, c.mobile_no as mob, a.Type as type, a.intime as time, a.time as otime FROM act a , coustomeradd c WHERE a.date = CURDATE() and a.castid = c.id and a.store = '{$_SESSION["store"]}'";

// Execute query and get results
$result = $link->query($sql);

// Display results in a table
echo '<table class="table table-bordered table-hover">';
echo '<thead class="thead-info">';
echo '<tr>';
echo '<th scope="col">#</th>';
echo '<th scope="col">Name</th>';
echo '<th scope="col">Mobile</th>';
echo '<th scope="col">Type</th>';
echo '<th scope="col">In Time</th>';
echo '<th scope="col">Out Time</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
if ($result->num_rows > 0) {
    $i = 1;
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<th scope="row">' . $i . '</th>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["mob"] . '</td>';
        echo '<td>' . $row["type"] . '</td>';
        echo '<td>' . $row["time"] . '</td>';
        echo '<td>' . $row["otime"] . '</td>';
        echo '</tr>';
        $i++;
    }
} else {
    echo '<tr><td colspan="6">No records found.</td></tr>';
}
echo '</tbody>';
echo '</table>';
?>

                    </div>
                    </div>


                  <div class="row">
                    <div class="col-md-6">
                    <h4>Walkout Customer Details</h4>
                                        <?php
// Include config file


// Define query
$sql = "SELECT c.cou_name as name, c.mobile_no as mob, a.Type as type, a.intime as time, a.time as otime FROM act a , coustomeradd c WHERE a.date = CURDATE() and a.castid = c.id and a.walkout = 'Yes' and a.store = '{$_SESSION["store"]}'";

// Execute query and get results
$result = $link->query($sql);

// Display results in a table
echo '<table class="table table-bordered table-hover">';
echo '<thead>';
echo '<tr>';
echo '<th scope="col">#</th>';
echo '<th scope="col">Name</th>';
echo '<th scope="col">Mobile</th>';
echo '<th scope="col">Type</th>';
echo '<th scope="col">In Time</th>';
echo '<th scope="col">Out Time</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
if ($result->num_rows > 0) {
    $i = 1;
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<th scope="row">' . $i . '</th>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["mob"] . '</td>';
        echo '<td>' . $row["type"] . '</td>';
        echo '<td>' . $row["time"] . '</td>';
        echo '<td>' . $row["otime"] . '</td>';
        echo '</tr>';
        $i++;
    }
} else {
    echo '<tr><td colspan="6">No records found.</td></tr>';
}
echo '</tbody>';
echo '</table>';
?>

                </div>

            </div>
        </main>




        <footer class="py-4 bg-black mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Vasundhara &copy; 2023</div>
                    
                </div>
            </div>
        </footer>
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