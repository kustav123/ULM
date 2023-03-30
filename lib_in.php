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