<?php
// Initialize the session
require_once "config.php";
// require_once "chat.php";
session_start();
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 300) {
  // last request was more than 15 minutes ago
  session_unset(); // unset $_SESSION variable for the run-time
  session_destroy(); // destroy session data in storage
  header("Location: logout.php"); // redirect to login page
}
$_SESSION['last_activity'] = time();
$pageName = basename($_SERVER['PHP_SELF']);
$role = $_SESSION["role"] ;
if($pageName !== 'ajax.php' && $pageName !== 'activity.php'  && $pageName !== 'fetch_notifications.php') {
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
      header("location: login.php");
      exit;
  }
  if(isset($_SESSION["role"]) && $_SESSION["role"] == 1) {
      include('navrole.php');
  } elseif (isset($_SESSION["role"]) && $_SESSION["role"] == 2) {
      include('navrole.php');
  } else {
      include('navrole.php');
  }
}

function logActivity($action, $table_name, $additional_info, $uid) {
  global $link;
 

  $sql = "INSERT INTO activity_log ( action, fun, additional_info, uid) VALUES ( ?, ?, ?, ?)";
  $stmt = mysqli_prepare($link, $sql);
  
  if (!$stmt) {
    // Error handling for failed prepare
    error_log("Error preparing statement: " . mysqli_error($link));
    return;
  }

  mysqli_stmt_bind_param($stmt, 'ssss',  $action, $table_name, $additional_info, $uid);

  if (!mysqli_stmt_execute($stmt)) {
    // Error handling for failed execute
    error_log("Error executing statement: " . mysqli_error($link));
  }
  
  mysqli_stmt_close($stmt);
}

// Check if last activity was set



if ($_SESSION["role"] != 1 ) {
        $sqle = "SELECT page FROM role WHERE id = $role";
        $resulte = $link->query($sqle);
        $row = $resulte->fetch_assoc();
        $pages = explode(",", $row['page']);
        if (in_array($pageName, $pages)) {
        // $pageName exists in the list
        
        } else {
        logActivity('Error', 'PageAccess', 'Unauthorised access on ' . $pageName .' by '.  $_SESSION["username"] , $_SESSION["id"] );

         echo '<script type="text/javascript">
				location.replace("logout.php");
			  </script>'; 
        } 

} 

// <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

// Check if the user is logged in, if not then redirect him to login page


// check for failed login count
if (!isset($_SESSION['toastShown'])) {
  echo '<head>
       
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <style>
#toast-container {
  position: fixed;
  top: 0;
  right: 0;
  z-index: 9999;
}
.toast {
  margin-top: 0.5rem;
}
.toast.alert .toast-header {
background-color: red;
color: white;
}
</style>

</head>';
echo '<div id="toast-container" aria-live="polite" aria-atomic="true">';

$username = $_SESSION["username"]; // Assuming username is submitted via POST method
$sql = "SELECT * FROM activity_log WHERE fun='Failed_login_attempt' AND additional_info LIKE '%$username%' and timestamp >= DATE_SUB(NOW(), INTERVAL 24 HOUR)";
$result = $link->query($sql);

while($row = $result->fetch_assoc()) {
    echo '<div class="toast alert" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
            <div class="toast-header">
                <strong class="me-auto">Failed login</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                There was a '.$row['additional_info'].' at '.$row['timestamp'].'
            </div>
        </div>';
}

echo '</div>';

echo '<script>
$(document).ready(function() {
    $(".toast").toast("show");
});
</script>';
$_SESSION['toastShown'] = true;
}

?>


