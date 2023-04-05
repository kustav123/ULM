<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
   
            <?php
// Include config file
require_once "config.php";
require_once "navbar.php";
error_reporting(E_ALL);
ini_set('display_errors',1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

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
        
        $sql = "INSERT INTO `act` ( `castid`, `date`, `tgi`, `tht`, `source`, `executive`, `associate`, `Type`, `product`, `billed`, `sr`, `requirement`, `fm`, `advance`, `orderst`, `walkout`, `reason`, `conversion`, `remarks`, `intime`, `time`, `user`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )" ;
         
        //  $sql = "INSERT INTO `test` (`castid`, `date`, `tgi`, `tht`, `s`, `ex`) VALUES (?, ?, ?, ?, ?, ?)" ;
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            // mysqli_stmt_bind_param($stmt, "ssssssssssssssssssss", $cou_id, 'curdate()', $tgi, $thc, $source, $executive, $associate, $type, $product, $billed, $sr, $requirement, $fm, $advance, $orderst, $walkout, $reason, $conversion, $remark, $time);
            date_default_timezone_set('Asia/Kolkata');
 
            $date = date('Y-m-d');
            mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssss", $cou_id, $date, $tgi, $thc, $source, $executive, $associate, $type, $product, $billed, $sr, $requirement, $fm, $advance, $orderst, $walkout, $reason, $conversion, $remark, $intime ,$time, $userid);
             
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
                $sql = "INSERT INTO followup (castid, cast_mob	,castname, remarks , 	updated_by ,date , createdby) VALUES ( '$cid', '$cmob' , '$cnamei', '$comment','$updatedby' , '$followup_date', '$username')";
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
       
    }
    
    // Close connection
    // mysqli_close($link);
}
?>

        <div id="layoutSidenav_content">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg text-white bg-info border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light text-info my-4">Exit Time</h3></div>
                                    <div class="card-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="out">
                                    <input type="hidden" name="tgi" class="form-control" id="tgi" >
                                    <input type="hidden" name="thc" class="form-control" id="thc" >
                                    <input type="hidden" name="itime" class="form-control" id="itime" >
                                    <input type="hidden" name="id" class="form-control" id="id" >
                                    <input type="hidden" name="cname" class="form-control" id="cname" >




                                             <div class="row">
                                                <div class="col">
                                                <label for="name">Name</label>
                                                <?php
                                                 // Include config file
                                                 require_once "config.php";
                                                 error_reporting(E_ALL);
                                                 ini_set('display_errors',1);
                                                 // Define variables and initialize with empty values 
                                                 $sqln = "SELECT  cou_id, name, mob FROM castin";
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
                                                 $sqle = "SELECT id, name FROM executive where status = 1";
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
                                                 $sqla = "SELECT id, name FROM associate where status = 1 and id != 1";
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
                                                    <!-- <select id="product" class="form-control" name='product'>
                                                    <option selected>KASULAPERU</option>
                                                    <option>MANGA MALAI</option>
                                                    <option>KAMARBANDS</option>
                                                    <option>VANKI</option>
                                                    <option>JADA BILLA</option>
                                                    <option>MAANG TIKA</option>
                                                    <option>JHUMKIS</option>
                                                    <option>BANGLES</option>
                                                    </select> -->
                                              </div>
                                                <div class="form-group col-md-4">
                                                   <label for="billed">Status</label>
                                                   <select id="billed" class="form-control" name='billed'>
                                                   <option selected>UnHappy</option>
                                                   <option>Happy</option>
                                                   </select>
                                               </div>
                                              </div>

                                         <div class="row">   
                                             <div class="col">
                                                   <label for="sr">Service/Repair</label>
                                                   <select id="sr" class="form-control" name='sr'>
                                                   <option selected>No</option>
                                                   <option>Yes</option>
                                                   </select>
                                             </div>
                                             <div class="col">
                                                   <label for="requirement">Requirement</label>
                                                   <select id="requirement" class="form-control" name='requirement'>
                                                   <option selected>No</option>
                                                   <option>Yes</option>
                                                   </select>
                                             </div>
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
                                        </div>

                                         
                       
                                         <div class="row">
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
                       
                                                <div class="form-group">
                                                       <label>Remarks</label>
                                                       <textarea name="remark" class="form-control "></textarea>
                                                       <span class="invalid-feedback"></span>
                                                   </div>

                                                   <div class="row">
                       
                                                    <div class="col">
                                                       <label for="reason">Exit Time</label>
                                                       <input type="Time" class="form-control" id="time" placeholder="time" name='time'>
                                                    </div>
                                                    <div class="col">
                                                    <label for="followup">Follow up:</label></br>
                                                    <input type="checkbox" id="followup" name="followup" onchange="toggleFollowUpFields()">

                                                    </div>

                                                    </div></br>

                                                    <div id="followup-fields" style="display: none;">
                                                    <label for="comment">Comment:</label>
                                                    <input type="text" id="comment" name="comment">

                                                    <label for="followup-date">Follow up date:</label>
                                                    <input type="datetime-local" id="followup-date" name="followup-date">


                                                    </div>
                       
                                                </br><input type="submit" class="btn btn-primary" value="Submit">
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
                </main>
            </div>

            <?php include("footer.php"); ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
         <!-- use any of these: ajax lib -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            function toggleFollowUpFields() {
            var followupCheckbox = document.getElementById("followup");
            var followupFields = document.getElementById("followup-fields");

            if (followupCheckbox.checked) {
                followupFields.style.display = "block";
            } else {
                followupFields.style.display = "none";
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
