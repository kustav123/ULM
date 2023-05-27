<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sale End</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
<?php
// Include config file
require_once "config.php";
require_once "navbar.php";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


// Define variables and initialize with empty values

$intimed = $cou_name_err = $inputmob= $type ="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name

    if(!isset($_POST["associate"])){
        $associate = 1 ;
    } else {
        $associate = trim($_POST["associate"]);
    }
    if(!isset($_POST["product"])){
        $product = 38 ;
    } else {
        $product = trim($_POST["product"]);
    }
    if(!isset($_POST["fm"])){
        $fm = '' ;
    } else {
        $fm = trim($_POST["fm"]);
    }


    $input_cou_id = trim($_POST["name"]);
    if(empty($input_cou_id)){
        $cou_name_err = "Add customer on database first.";
    
    } else {
        $cou_id = $input_cou_id;
        $tgi = trim($_POST["tgi"]); 
        $thc = trim($_POST["thc"]); 
        $source = trim($_POST["ws"]);
        $executive = trim($_POST["executive"]);
        $type = trim($_POST["type"]);
        $billed = trim($_POST["billed"]);
        $sr = trim($_POST["sr"]);
        $requirement = trim($_POST["requirement"]);
        $advance = trim($_POST["advance"]);
        $orderst = trim($_POST["order"]);
        $walkout = trim($_POST["walk"]);
        $reason = trim($_POST["reason"]);
        $conversion = trim($_POST["conversion"]);
        $remark = trim($_POST["remark"]);
        $time = trim($_POST["time"]);
        $intime = trim($_POST["itime"]);
        $id =   trim($_POST["id"]);
        $userid = $_SESSION["id"];     
        $username = $_SESSION["username"]; 
    }
    
    
    // Check input errors before inserting in database
    if(empty($cou_name_err) ){
        
   
        $sql = "INSERT INTO `act` ( `castid`, `date`, `tgi`, `tht`, `source`, `executive`, `associate`, `Type`, `product`, `billed`, `sr`, `requirement`, `fm`, `advance`, `orderst`, `walkout`, `reason`, `conversion`, `remarks`, `intime`, `time`, `user`, `store`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )" ;
         
        //  $sql = "INSERT INTO `test` (`castid`, `date`, `tgi`, `tht`, `s`, `ex`) VALUES (?, ?, ?, ?, ?, ?)" ;
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            // mysqli_stmt_bind_param($stmt, "ssssssssssssssssssss", $cou_id, 'curdate()', $tgi, $thc, $source, $executive, $associate, $type, $product, $billed, $sr, $requirement, $fm, $advance, $orderst, $walkout, $reason, $conversion, $remark, $time);
           
            if (isset($_POST["backdate"]) && $_POST["backdate"] == "on") {

                $date = $_POST["date"] ;
            } else {
                date_default_timezone_set('Asia/Kolkata');
 
                $date = date('Y-m-d');
            } 
            
            mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssss", $cou_id, $date, $tgi, $thc, $source, $executive, $associate, $type, $product, $billed, $sr, $requirement, $fm, $advance, $orderst, $walkout, $reason, $conversion, $remark, $intime ,$time, $userid, $_SESSION["store"]);
             
            if(mysqli_stmt_execute($stmt)){
               // Records created successfully. Redirect to landing page
               if (isset($_POST["followup"]) && $_POST["followup"] == "on") {
                // Get comment and follow-up date from form
                $cid =  $input_cou_id;
                $cmob = $_POST["inputmob"];
                $comment = $_POST["comment"];
                $followup_date = $_POST["followup-date"];
                $cnamei = $_POST["cname"];
                $updatedby = $_SESSION["username"];
                // Insert comment and follow-up date into follow-up table
                $store = $_SESSION["store"] ;
                $sql = "INSERT INTO followup (castid, cast_mob	,castname, remarks , 	updated_by ,date , createdby, store, type) VALUES ( '$cid', '$cmob' , '$cnamei', '$comment','$updatedby' , '$followup_date', '$username', '$store', '$type')";
                if (mysqli_query($link, $sql)) {
                    logActivity('Add', 'Followup', 'Customer Followup ' . $cmob .' by '.  $_SESSION["username"] , $_SESSION["id"] );    
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($link);
                }
            }
               logActivity('Submit', 'Customer out', 'Customer Exit ' . $cou_id .' by '.  $_SESSION["username"] , $_SESSION["id"] );    

                echo '<script type="text/javascript">
				location.replace("out.php");
			  </script>';
        // mysqli_stmt_close($stmt);
        $delin = "delete from castin where id = $id" ;
        $del = $link->query($delin);
        mysqli_stmt_close($stmt);
            mysqli_close($link);
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
       // mysqli_stmt_close($stmt);
    }
    
    // Close connection
    // mysqli_close($link);
}
?>
<div id="layoutSidenav_content">

    <div class="container">
        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Profile</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="in.php">Home</a></li>
                        <li class="breadcrumb-item">Sale End</li>
                        <li class="breadcrumb-item active">Visit Type</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section profile">
                <div class="row">


                    <div class="col-xl-8">

                        <div class="card">
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered">

                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#profile-overview">Formal Visit</button>
                                    </li>
                                    <!-- 
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#profile-edit">Casul Visit</button>
                                    </li> -->

                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#profile-settings">Service & requirment</button>
                                    </li>

                                    <!-- <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#profile-change-password">Advance</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#profile-change-password">Camp Visit</button>
                                    </li> -->

                                </ul>

                                <div class="tab-content pt-2">
                                    <!-- joining Pro. section -->
                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">


                                        <div class="card col-md-8 m-auto">
                                            <div class="card-body">
                                                <h5 class="card-title">Formal Visit</h5>

                                                <!-- Joining pro Form -->
                                                <form class="row g-3">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="name">Name</label>
                                                            <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqln = "SELECT  cou_id, name, mob FROM castin WHERE store = '{$_SESSION["store"]}'";
                                                 $resultn = $link->query($sqln);
                                                 // Create dropdown
                                                 echo '<select name="name" class="form-control" id="name" placeholder="name">';
                                                 echo '<option disabled selected value> Select Customer Name -- </option>';
                                                 while($row = $resultn ->fetch_assoc()) {
                                                     echo '<option value="' . $row['cou_id'] . '">' . $row['name'] . '</option>';
                                                 }
                                                 echo '</select>';
 
                                                 ?>
                                                        </div>
                                                        <div class="col">
                                                            <label for="inputmob">Mobile</label>
                                                            <input type="text" class="form-control" id="inputmob"
                                                                value="<?php echo $inputmob;?>" name="inputmob"
                                                                readonly>
                                                        </div>
                                                        <div class="col">
                                                            <label for="in time">In Time</label>
                                                            <input type="text" class="form-control" id="intimed"
                                                                value="<?php echo $intimed;?>" name="intimed" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="ws">Walkin source</label>
                                                            <select id="ws" class="form-control" name='ws'>
                                                                <option selected>Self</option>
                                                                <option>Facebook</option>
                                                                <option>Instagram</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <label for="executive">Sales executive</label>
                                                            <!-- <input type="text" class="form-control" id="executive" placeholder="Executive" name='executive'> -->
                                                            <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqle = "SELECT id, name FROM executive where status = 1 and store = '{$_SESSION["store"]}'";
                                                 $resulte = $link->query($sqle);
                       
                                                 // Create dropdown
                                                 echo '<select name="executive" class="form-control" id="executive" placeholder="executive">';
                                                 echo '<option disabled selected value> Select Executive Name -- </option>';
                                                 while($row = $resulte->fetch_assoc()) {
                                                     echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                 }
                                                 echo '</select>';
                       
                                                
                                                 ?>
                                                        </div>
                                                        <div class="col">
                                                            <label for="associate">Sales associate</label>
                                                            <!-- <input type="text" class="form-control" id="associate" placeholder="Associate" name='associate'> -->
                                                            <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqla = "SELECT id, name FROM associate where status = 1 and id != 1 and store = '{$_SESSION["store"]}'";
                                                 $resulta = $link->query($sqla);
                       
                                                 // Create dropdown
                                                 echo '<select name="associate" class="form-control" id="associate" placeholder="Associate">';
                                                 echo '<option disabled selected value> Select Associate Name -- </option>';
                                                 while($row = $resulta->fetch_assoc()) {
                                                     echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                 }
                                                 echo '</select>';
                       
                                                 
                                                 ?>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col">
                                                            <label for="type">Type</label>
                                                            <input type="text" class="form-control" id="type"
                                                                name='type' value="<?php echo $type; ?>" readonly>
                                                        </div>


                                                        <div class="form-group col-md-4">
                                                            <label for="product">Product</label>
                                                            <!-- <input type="text" class="form-control" id="associate" placeholder="Associate" name='associate'> -->
                                                            <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqla = "SELECT id, name FROM product where status = 1 and id != 38";
                                                 $resulta = $link->query($sqla);
                       
                                                 // Create dropdown
                                                 echo '<select name="product" class="form-control" id="product" placeholder="product">';
                                                 echo '<option disabled selected value> Select Product Name -- </option>';
                                                 while($row = $resulta->fetch_assoc()) {
                                                     echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                 }
                                                 echo '</select>';
                       
                                                 
                                                 ?>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="billed">Status</label>
                                                            <select id="billed" class="form-control" name='billed'>
                                                                <option selected>UnHappy</option>
                                                                <option>Happy</option>
                                                                <option>Requirement</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        
                                                        <div class="col">
                                                            <label for="fm">FM/SM/GM</label>
                                                            <select id="fm" class="form-control" name='fm'>
                                                                <option selected disabled>FM/SM/GM</option>
                                                                <option>Rohan sir</option>
                                                                <option>Puneet</option>
                                                                <option>Jalandar</option>
                                                                <option>Rajesh</option>
                                                                <option>Bhavani</option>
                                                                <option>Vasundhara Ma'am</option>
                                                                <option>Ayushi Ma'am</option>
                                                                <option>Neha Ma'am</option>
                                                                <option>Harshita Ma'am</option>
                                                                <option>Veerendra</option>
                                                                <option>Khaza</option>
                                                                <option>Ashok</option>
                                                                <option>Abhilash</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <label for="advance">Advance</label>
                                                            <select id="advance" class="form-control" name='advance'>
                                                                <option selected>No</option>
                                                                <option>Yes</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <label for="order">Order</label>
                                                            <select id="order" class="form-control" name='order'>
                                                                <option selected>No</option>
                                                                <option>Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>



                                                    <div class="row">
                                                        
                                                        <div class="col">
                                                            <label for="walk">Walk-out</label>
                                                            <select id="walk" class="form-control" name='walk'>
                                                                <option selected>No</option>
                                                                <option>Yes</option>
                                                            </select>
                                                        </div>
                                                        

                                                        <div class="col">
                                                            <label for="conversion">Conversion</label>
                                                            <select id="conversion" class="form-control"
                                                                name='conversion'>
                                                                <option selected>0%</option>
                                                                <option>100%</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                    
                                                    <div class="col">
                                                            <label for="reason">Reason for non conversion</label>
                                                            <input type="text" class="form-control" id="reason"
                                                                placeholder="Reason" name='reason'>
                                                        </div>
                                                        <div class="col">
                                                        <label>Remarks</label>
                                                        <textarea name="remark" class="form-control "></textarea>
                                                        <span class="invalid-feedback"></span>
                                                    </div>
                                                        </div>

                                                    <div class="row">

                                                        <div class="col">
                                                            <label for="Time">Exit Time</label>
                                                            <input type="Time" class="form-control" id="time"
                                                                placeholder="time" name='time'>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="backdate">Back date</label></br>
                                                            <input type="checkbox" id="backdate" name="backdate"
                                                                onchange="toggleBackdateFields()">
                                                            <div id="backdateField" div class="col"
                                                                style="display: none;">
                                                                <label for="date">Exit Date</label>
                                                                <input type="date" class="form-control" id="date"
                                                                    placeholder="date" name='date'>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <label for="followup">Follow up:</label></br>
                                                            <input type="checkbox" id="followup" name="followup"
                                                                onchange="toggleFollowUpFields()">
                                                        </div>

                                                    </div></br>

                                                    <div class="d-none d-sm-block">

                                                        <div id="followup-fields" style="display: none;">
                                                            <label for="comment">Comment:</label></br>
                                                            <input type="text" id="comment" name="comment">

                                                            <label for="followup-date">Follow up date:</label>
                                                            <input type="datetime-local" id="followup-date"
                                                                name="followup-date">
                                                        </div>

                                                    </div>

                                                    </br>
                                                    <div class="text-center">
                                                        <input type="submit" class="btn btn-primary" value="Submit">
                                                    <a href="saleout.php" class="btn btn-secondary ml-2">Cancel</a>
                                                    </div>

                                                </form><!-- End formul visit -->

                                            </div>
                                        </div>

                                    </div>

                                    <!-- team visit section -->
                                    <div class="tab-pane fade profile-overview" id="profile-edit">

                                        <!-- team visit Form -->
                                        <div class="card col-md-8 m-auto">

                                        </div>

                                    </div>

                                    <div class="tab-pane fade pt-3" id="profile-settings">
                                    <div class="card col-md-8 m-auto">
                                            <div class="card-body">
                                            <h5 class="card-title">Service & Repair</h5>
                                        <!-- Settings Form -->
                                        <form>

                                            <div class="row mb-3">
                                               
                                                    <div class="row">
                                                <div class="col">
                                                <label for="name">Name</label>
                                                <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqln = "SELECT  cou_id, name, mob FROM castin WHERE store = '{$_SESSION["store"]}'";
                                                 $resultn = $link->query($sqln);
                                                 // Create dropdown
                                                 echo '<select name="name" class="form-control" id="name" placeholder="name">';
                                                 echo '<option disabled selected value> Select Customer Name -- </option>';
                                                 while($row = $resultn ->fetch_assoc()) {
                                                     echo '<option value="' . $row['cou_id'] . '">' . $row['name'] . '</option>';
                                                 }
                                                 echo '</select>';
 
                                                 ?>           
                                             </div>
                                                <div class="col">
                                                <label for="inputmob">Mobile</label>
                                                <input type="text" class="form-control" id="inputmob" value="<?php echo $inputmob;?>"  name="inputmob" readonly>
                                                </div>
                                                <div class="col">
                                                <label for="in time">In Time</label>
                                                <input type="text" class="form-control" id="intimed" value="<?php echo $intimed;?>"  name="intimed" readonly>
                                                </div>
                                             </div>

                                             <div class="row">
                                                <div class="col">
                                                   <label for="ws">Walkin source</label>
                                                   <select id="ws" class="form-control" name='ws'>
                                                   <option selected>Self</option>
                                                   <option>Facebook</option>
                                                   <option>Instagram</option>
                                                   </select>
                                                 </div>
                                              <div class="col">
                                                <label for="executive">Sales executive</label>
                                                <!-- <input type="text" class="form-control" id="executive" placeholder="Executive" name='executive'> -->
                                                <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqle = "SELECT id, name FROM executive where status = 1 and store = '{$_SESSION["store"]}'";
                                                 $resulte = $link->query($sqle);
                       
                                                 // Create dropdown
                                                 echo '<select name="executive" class="form-control" id="executive" placeholder="executive">';
                                                 echo '<option disabled selected value> Select Executive Name -- </option>';
                                                 while($row = $resulte->fetch_assoc()) {
                                                     echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                 }
                                                 echo '</select>';
                       
                                                
                                                 ?>                    
                                              </div>
                                              <div class="col">
                                                <label for="associate">Sales associate</label>
                                                <!-- <input type="text" class="form-control" id="associate" placeholder="Associate" name='associate'> -->
                                                <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqla = "SELECT id, name FROM associate where status = 1 and id != 1 and store = '{$_SESSION["store"]}'";
                                                 $resulta = $link->query($sqla);
                       
                                                 // Create dropdown
                                                 echo '<select name="associate" class="form-control" id="associate" placeholder="Associate">';
                                                 echo '<option disabled selected value> Select Associate Name -- </option>';
                                                 while($row = $resulta->fetch_assoc()) {
                                                     echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                 }
                                                 echo '</select>';
                       
                                                 
                                                 ?>                        
                                              </div>
                                              </div>
                                            
                                              <div class="row">
                                              
                                                <div class="col">
                                                <label for="type">Type</label>
                                                <input type="text" class="form-control" id="type"  name='type' value="<?php echo $type; ?>" readonly>
                                                </div>
                                                
                                                 
                                                 <div class="form-group col-md-4">
                                                    <label for="product">Product</label>
                                                    <!-- <input type="text" class="form-control" id="associate" placeholder="Associate" name='associate'> -->
                                                <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqla = "SELECT id, name FROM product where status = 1 and id != 38";
                                                 $resulta = $link->query($sqla);
                       
                                                 // Create dropdown
                                                 echo '<select name="product" class="form-control" id="product" placeholder="product">';
                                                 echo '<option disabled selected value> Select Product Name -- </option>';
                                                 while($row = $resulta->fetch_assoc()) {
                                                     echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                 }
                                                 echo '</select>';
                       
                                                 
                                                 ?>
                                                    
                                              </div>
                                              <div class="col">
                                                   <label for="sr">Service/Repair</label>
                                                   <select id="sr" class="form-control" name='sr'>
                                                   <option selected>No</option>
                                                   <option>Yes</option>
                                                   </select>
                                             </div>
                                              </div>

                                         <div class="row">   
                                             
                                             
                                             <div class="col">
                                                   <label for="fm">FM/SM/GM</label>
                                                   <select id="fm" class="form-control" name='fm'>
                                                   <option selected disabled>FM/SM/GM</option>
                                                   <option>Rohan sir</option>
                                                   <option>Puneet</option>
                                                   <option>Jalandar</option>
                                                   <option>Rajesh</option>
                                                   <option>Bhavani</option>
                                                   <option>Vasundhara Ma'am</option>
                                                   <option>Ayushi Ma'am</option>
                                                   <option>Neha Ma'am</option>
                                                   <option>Harshita Ma'am</option>
                                                   <option>Veerendra</option>
                                                   <option>Khaza</option>
                                                   <option>Ashok</option>
                                                   <option>Abhilash</option>
                                                   </select>
                                             </div>
                                             <div class="col">
                                                   <label for="advance">Advance</label>
                                                   <select id="advance" class="form-control" name='advance'>
                                                   <option selected>No</option>
                                                   <option>Yes</option>
                                                   </select>
                                              </div>
                                             
                                             <div class="col">
                                                   <label for="walk">Walk-out</label>
                                                   <select id="walk" class="form-control" name='walk'>
                                                   <option selected>No</option>
                                                   <option>Yes</option>
                                                   </select>
                                             </div>
                                        </div>
                       
                                           <div class="row">
                       
                                                <div class="col">
                                                   <label for="reason">Reason for non conversion</label>
                                                   <input type="text" class="form-control" id="reason" placeholder="Reason" name='reason'>
                                                </div>
                                                
                                                <div class="col">
                                                   <label for="conversion">Conversion</label>
                                                   <select id="conversion" class="form-control" name='conversion'>
                                                   <option selected>0%</option>
                                                   <option>100%</option>
                                                   </select>
                                                 </div>
                                           </div>
                                           <div class="row">
                       
                                                <div class="col">
                                                       <label>Remarks</label>
                                                       <textarea name="remark" class="form-control "></textarea>
                                                       <span class="invalid-feedback"></span>
                                                   </div>
                                                   <div class="col">
                                                       <label for="Time">Exit Time</label>
                                                       <input type="Time" class="form-control" id="time" placeholder="time" name='time'>
                                                    </div>
                                                    
                                                   </div>

                                                   <div class="row">
                       
                                                    
                                                    <div class="col-md-4" >
                                                    <label for="backdate">Back date</label></br>
                                                    <input type="checkbox" id="backdate" name="backdate" onchange="toggleBackdateFields()">
                                                       <div id ="backdateField" div class="col" style="display: none;">
                                                       <label for="date">Exit Date</label>
                                                       <input type="date" class="form-control" id="date" placeholder="date" name='date'>
                                                       </div>
                                                    </div>
                                                    <div class="col">
                                                    <label for="followup">Follow up:</label></br>
                                                    <input type="checkbox" id="followup" name="followup" onchange="toggleFollowUpFields()">
                                                    </div>

                                                    </div></br>
                                                   
                                                    <div class="d-none d-sm-block">

                                                    <div id="followup-fields" style="display: none;">
                                                    <label for="comment">Comment:</label></br>
                                                    <input type="text" id="comment" name="comment">
                                                   
                                                    <label for="followup-date">Follow up date:</label>
                                                    <input type="datetime-local" id="followup-date" name="followup-date">
                                                    </div>

                                                    </div>
                                            </div>

                                            <div class="text-center">
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                                    <a href="saleout.php" class="btn btn-secondary ml-2">Cancel</a>
                                            </div>
                                        </form><!-- End settings Form -->

                                    </div>

                                    <div class="tab-pane fade pt-3" id="profile-change-password">
                                        <!-- Change Password Form -->
                                        <form>

                                        </form><!-- End Change Password Form -->

                                    </div>

                                </div><!-- End Bordered Tabs -->
                                </div></div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </main><!-- End #main -->
    </div>


    <?php include("footer.php"); ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
         <!-- use any of these: ajax lib -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

        <script>
            function toggleFollowUpFields() {
            var fCheckbox = document.getElementById("followup");
            var fFields = document.getElementById("followup-fields");

            if (fCheckbox.checked) {
                fFields.style.display = "block";
            } else {
                fFields.style.display = "none";
            }
            }
        </script>

        <script>
            function toggleBackdateFields() {
            var bCheckbox = document.getElementById("backdate");
            var bFields = document.getElementById("backdateField");

            if (bCheckbox.checked) {
                bFields.style.display = "block";
            } else {
                bFields.style.display = "none";
            }
            }
        </script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                $('#name').change(function(){
                    var cou_id = $(this).val();
                    $.ajax({
                        url:"ajax.php",
                        method:"GET",
                        data:{
                            cou_id:cou_id
                        },
                        success:function(response){
                            $('#inputmob').val(response.mob);
                            $('#intimed').val(response.intime);
                            $('#thc').val(response.thc);
                            $('#tgi').val(response.tgi);
                            $('#itime').val(response.intime);
                            $('#id').val(response.id);
                            $('#cname').val(response.name);
                            $('#type').val(response.type);



                        }
                    });
                });
            });

 </script>


</script>
</body>

</html>