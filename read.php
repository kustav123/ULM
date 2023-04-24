<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Dispaly</title>
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
                        <!-- <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tables</li>
                        </ol> -->
                        <div class="card mb-4">
                            <div class="card-header text-white">
                                <i class="fas fa-table me-1"></i>
                                Coustomer sales Details
                            </div>
                            
                            <div class="card-body ">
<?php

// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
   
    // Prepare a select statement
    $sql = "SELECT a.* ,x.name as associaten, y.name as executiven, p.name as productname,z.username as crm FROM act a ,  associate x ,executive y, product p,users z where a.castid = ? and x.id = a.associate and y.id = a.executive and z.id = a.user and a.product = p.id";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id );
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) > 0){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                
                // Retrieve individual field value
               echo '<div id="myTableWrapper">' ;
                echo '<table id= "tableid" class="table table-bordered table-striped table-sm" cellspacing="0" width="100%" >';
                // echo '<table id="myTable" class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">';
                              
                               echo '<thead class="thead-dark">';
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        // echo "<th>Mobile</th>";
                                        // echo "<th>Name</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Total group ins</th>";
                                        echo "<th>Total head count</th>";
                                        echo "<th>Visit Source</th>";
                                        echo "<th>Sales Executive</th>";
                                        echo "<th>Sales Associate</th>";
                                        echo "<th>Type</th>";
                                        echo "<th>Product</th>";
                                        echo "<th>Status</th>";
                                        echo "<th>Service/Repair</th>";
                                        echo "<th>Requirement</th>";
                                        echo "<th>FM/SM/GM/</th>";
                                        echo "<th>Advance</th>";
                                        echo "<th>Order</th>";
                                        echo "<th>Walkout</th>";
                                        echo "<th>Reason</th>";
                                        echo "<th>Conversion</th>";
                                        echo "<th>Remarks</th>";
                                        echo "<th>In Time</th>";
                                        echo "<th>Out Time</th>";
                                        echo "<th>C.R.E</th>";
                                        echo "<th>Store</th>";

                                       
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['actid'] . "</td>";
                                        // echo "<td>" . $row['mobile_no'] . "</td>";
                                        // echo "<td>" . $row['cou_name'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>" . $row['tgi'] . "</td>";
                                        echo "<td>" . $row['tht'] . "</td>";
                                        echo "<td>" . $row['source'] . "</td>";
                                        echo "<td>" . $row['executiven'] . "</td>";
                                        echo "<td>" . $row['associaten'] . "</td>";
                                        echo "<td>" . $row['Type'] . "</td>";
                                        echo "<td>" . $row['productname'] . "</td>";
                                        echo "<td>" . $row['billed'] . "</td>";
                                        echo "<td>" . $row['sr'] . "</td>";
                                        echo "<td>" . $row['requirement'] . "</td>";
                                        echo "<td>" . $row['fm'] . "</td>";
                                        echo "<td>" . $row['advance'] . "</td>";
                                        echo "<td>" . $row['orderst'] . "</td>";
                                        echo "<td>" . $row['walkout'] . "</td>";
                                        echo "<td>" . $row['reason'] . "</td>";
                                        echo "<td>" . $row['conversion'] . "</td>";
                                        echo "<td>" . $row['remarks'] . "</td>";
                                        echo "<td>" . $row['intime'] . "</td>";
                                        echo "<td>" . $row['time'] . "</td>";
                                        echo "<td>" . $row['crm'] . "</td>";
                                        echo "<td>" . $row['store'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            
                          
                            echo '</div>';
                       
                       
                            echo '
              <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
              <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
              <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
              <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
              <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
              <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>

              <style>
              .dt-button {
                  position: relative;
                  float: right;
                  margin-left: 10px;
                  margin-bottom: 10px;
                  top: 0;
                  right: 50%;
                }
                
                @media screen and (max-width: 767px) {
                  .dt-buttons {
                    margin-top: 10px;
                  }
                  .dt-button {
                    float: none;
                    margin-left: 0;
                    margin-bottom: 5px;
                    display: block;
                  }
                }
              </style>

              <script>
              $(document).ready(function() {
                  $("#tableid").DataTable({
                      "scrollX": true,
                      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                      "dom": "lBfrtip",
                      buttons: [
                          {
                              extend: "print",
                              text: "Print",
                              className: "btn-primary"
                          },
                          {
                              extend: "excel",
                              text: "Excel",
                              className: "btn-primary",
                              exportOptions: {
                                columns: `:visible`
                              },
                              customize: function (xlsx) {
                                  var sheet = xlsx.xl.worksheets[\'sheet1.xml\'];
                                  $(\'row c[r^="C"]\', sheet).attr(\'s\', \'2\');
                              }
                          }
                      ]
                  });
              });
              </script>
';                         
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                echo "No trunsection found for this user." ;
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
        // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
  }

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// for date 
if (isset($_POST["to"]) && isset($_POST["from"])) {
  require_once "config.php";
        
  $to = $from = "";
    $to_err = $from_err = "";
    // Processing form data when form is submitted
    if(isset($_POST["to"]) && !empty($_POST["to"])){
        // Validate to
    
    $input_to = trim($_POST["to"]);
    if(empty($input_to)){
        $to_err = "Please select to date.";
    
    } else{
        $to = $input_to;
    }
    
    // Validate from
    $input_from = trim($_POST["from"]);
    if(empty($input_from)){
        $from_err = "Please select from date.";
    
    } else{
        $from = $input_from;
    }
    
    // $input_store = trim($_POST["store"]);
    // if(empty($input_store)){
    //     $store_err = "Please select store name.";
    
    // } else{
    //     $store = $input_store;
    // }
    
    // Check input errors before inserting in database
    if(empty($to_err) && empty($from_err) ){
      $store = $_POST["store"];
        // Prepare an insert statement
        // $param_store = implode(", ", $_POST["store"]);
        
        //$sql = "SELECT a.* , b.mobile_no, b.cou_name , p.name as pname ,x.name as associaten, y.name as executiven, z.username as crm FROM act a , coustomeradd b, associate x ,executive y, product p ,users z where a.date between ? and ? and  b.id = a.castid and x.id = a.associate and y.id = a.executive and z.id = a.user and a.product = p.id and a.store in (".str_repeat('?,', count($store)-1) . '?) ;";
        $sql = "SELECT a.*, b.mobile_no, b.cou_name, p.name AS pname, x.name AS associaten, y.name AS executiven, z.username AS crm 
        FROM act a, coustomeradd b, associate x, executive y, product p, users z 
        WHERE a.date BETWEEN ? AND ? 
            AND b.id = a.castid 
            AND x.id = a.associate 
            AND y.id = a.executive 
            AND z.id = a.user 
            AND a.product = p.id 
            AND a.store IN (".str_repeat('?,', count($store)-1) . '?)';
      

         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_from, $param_to);
            
            // Set parameters
            $param_from = $from;
            $param_to = $to;
           

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                $result = mysqli_stmt_get_result($stmt);

                // Records deleted successfully. Redirect to landing page
                // if(mysqli_stmt_num_rows($stmt) > 0){
                if(mysqli_num_rows($result) > 0){     
                  echo '<div id="myTableWrapperx" >' ;
                  echo '<table id= "tableidy"class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">';
                                  echo '<thead class="thead-dark">';
                      echo "<tr>";
                          echo "<th>#</th>";
                          echo "<th>Date</th>";
                          echo "<th>Name</th>";
                          echo "<th>Mobile</th>";
                          echo "<th>Total group ins</th>";
                          echo "<th>Total head count</th>";
                          echo "<th>Visit Source</th>";
                          echo "<th>Sales Executive</th>";
                          echo "<th>Sales Associate</th>";
                          echo "<th>Type</th>";
                          echo "<th>Product</th>";
                          echo "<th>Status</th>";
                          echo "<th>Service/Repair</th>";
                          echo "<th>Requirement</th>";
                          echo "<th>FM/SM/GM</th>";
                          echo "<th>Advance</th>";
                          echo "<th>Order</th>";
                          echo "<th>Walkout</th>";
                          echo "<th>Reason</th>";
                          echo "<th>Conversion</th>";
                          echo "<th>Remarks</th>";
                          echo "<th>In Time</th>";
                          echo "<th>Out Time</th>";
                          echo "<th>CRM</th>";
                         
                          
                      echo "</tr>";
                  echo "</thead>";
                  echo "<tbody>";
                  while($row = mysqli_fetch_array($result)){
                      echo "<tr>";
                          echo "<td>" . $row['actid'] . "</td>";
                          echo "<td>" . $row['date'] . "</td>";
                          echo "<td>" . $row['cou_name'] . "</td>";
                          echo "<td>" . $row['mobile_no'] . "</td>";                                              
                          echo "<td>" . $row['tgi'] . "</td>";
                          echo "<td>" . $row['tht'] . "</td>";
                          echo "<td>" . $row['source'] . "</td>";
                          echo "<td>" . $row['executiven'] . "</td>";
                          echo "<td>" . $row['associaten'] . "</td>";
                          echo "<td>" . $row['Type'] . "</td>";
                          echo "<td>" . $row['pname'] . "</td>";
                          echo "<td>" . $row['billed'] . "</td>";
                          echo "<td>" . $row['sr'] . "</td>";
                          echo "<td>" . $row['requirement'] . "</td>";
                          echo "<td>" . $row['fm'] . "</td>";
                          echo "<td>" . $row['advance'] . "</td>";
                          echo "<td>" . $row['orderst'] . "</td>";
                          echo "<td>" . $row['walkout'] . "</td>";
                          echo "<td>" . $row['reason'] . "</td>";
                          echo "<td>" . $row['conversion'] . "</td>";
                          echo "<td>" . $row['remarks'] . "</td>";
                          echo "<td>" . $row['intime'] . "</td>";
                          echo "<td>" . $row['time'] . "</td>";
                          echo "<td>" . $row['crm'] . "</td>";
                      echo "</tr>";
                  }
                  echo "</tbody>";                            
              echo "</table>";
              echo '</div>';
              echo '
              <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
              <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
              <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
              <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
              <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
              <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>

              <style>
              .dt-button {
                  position: relative;
                  float: right;
                  margin-left: 10px;
                  margin-bottom: 10px;
                  top: 0;
                  right: 50%;
                }
                
                @media screen and (max-width: 767px) {
                  .dt-buttons {
                    margin-top: 10px;
                  }
                  .dt-button {
                    float: none;
                    margin-left: 0;
                    margin-bottom: 5px;
                    display: block;
                  }
                }
              </style>

              <script>
              $(document).ready(function() {
                  $("#tableidy").DataTable({
                      "scrollX": true,
                      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                      "dom": "lBfrtip",
                      buttons: [
                          {
                              extend: "print",
                              text: "Print",
                              className: "btn-primary"
                          },
                          {
                              extend: "excel",
                              text: "Excel",
                              className: "btn-primary",
                              exportOptions: {
                                columns: `:visible`
                              },
                              customize: function (xlsx) {
                                  var sheet = xlsx.xl.worksheets[\'sheet1.xml\'];
                                  $(\'row c[r^="C"]\', sheet).attr(\'s\', \'2\');
                              }
                          }
                      ]
                  });
              });
              </script>
';
                    // Free result set
                    mysqli_stmt_free_result($stmt);
                    mysqli_close($link);
                // } else{
                //     echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                // }
            } else{
                echo "Oops! Something went wrong. Please try again later .";
            }
    
          }
      }
    }
  }
}   

// for date and executive 

if (isset($_POST["froma"]) && isset($_POST["toa"])) {
    require_once "config.php";
    
    
      $to_err = $from_err = "";
      // Processing form data when form is submitted
      if(isset($_POST["toa"]) && !empty($_POST["toa"])){
          // Validate to
          
      $input_toa= trim($_POST["toa"]);
      if(empty($input_toa)){
          $to_erra = "Please select to date.";
      
      } else{
          $toa = $input_toa;
        
      }
      
      // Validate from
      $input_froma = trim($_POST["froma"]);
      if(empty($input_froma)){
          $from_erra = "Please select from date.";
      
      } else{
          $froma = $input_froma;
          $eid = trim($_POST["executive"]) ;
          
      }
      
      
      
      // Check input errors before inserting in database
      if(empty($to_erra) && empty($from_erra) ){
        
          // Prepare an insert statement
          $sql = "SELECT a.* , b.mobile_no, b.cou_name ,p.name as pname, x.name as associaten,  z.username as crm FROM act a , coustomeradd b, associate x ,product p, users z where a.date between ? and ?  and a.executive = ? and  b.id = a.castid and x.id = a.associate and  a.product = p.id and z.id = a.user;";
          
  
  
           
          if($stmt = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "sss", $param_from, $param_to, $param_id);
              
              // Set parameters
              $param_from = $froma;
              $param_to = $toa;
              $param_id = $eid ;

  
              
              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                  // Records created successfully. Redirect to landing page
                  $result = mysqli_stmt_get_result($stmt);
                  
                  // Records deleted successfully. Redirect to landing page
                  // if(mysqli_stmt_num_rows($stmt) > 0){
                  if(mysqli_num_rows($result) > 0){     
                    echo '<div id="myTableWrapperx" >' ;
                    echo '<table id= "tableidy"class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">';
                                    echo '<thead class="thead-dark">';
                        echo "<tr>";
                            echo "<th>#</th>";
                            echo "<th>Date</th>";
                            echo "<th>Name</th>";
                            echo "<th>Mobile</th>";                        
                            echo "<th>Total group ins</th>";
                            echo "<th>Total head count</th>";
                            echo "<th>Visit Source</th>";
                            echo "<th>Sales Associate</th>";
                            echo "<th>Type</th>";
                            echo "<th>Product</th>";
                            echo "<th>Status</th>";
                            echo "<th>Service/Repair</th>";
                            echo "<th>Requirement</th>";
                            echo "<th>FM/SM/GM/-ate</th>";
                            echo "<th>Advance</th>";
                            echo "<th>Order</th>";
                            echo "<th>Walkout</th>";
                            echo "<th>Reason</th>";
                            echo "<th>Conversion</th>";
                            echo "<th>Remarks</th>";
                            echo "<th>In Time</th>";
                            echo "<th>Out Time</th>";
                            echo "<th>CRM</th>";
                            
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td>" . $row['actid'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['cou_name'] . "</td>";
                            echo "<td>" . $row['mobile_no'] . "</td>";                           
                            echo "<td>" . $row['tgi'] . "</td>";
                            echo "<td>" . $row['tht'] . "</td>";
                            echo "<td>" . $row['source'] . "</td>";
                            echo "<td>" . $row['associaten'] . "</td>";
                            echo "<td>" . $row['Type'] . "</td>";
                            echo "<td>" . $row['product'] . "</td>";
                            echo "<td>" . $row['billed'] . "</td>";
                            echo "<td>" . $row['sr'] . "</td>";
                            echo "<td>" . $row['requirement'] . "</td>";
                            echo "<td>" . $row['fm'] . "</td>";
                            echo "<td>" . $row['advance'] . "</td>";
                            echo "<td>" . $row['orderst'] . "</td>";
                            echo "<td>" . $row['walkout'] . "</td>";
                            echo "<td>" . $row['reason'] . "</td>";
                            echo "<td>" . $row['conversion'] . "</td>";
                            echo "<td>" . $row['remarks'] . "</td>";
                            echo "<td>" . $row['intime'] . "</td>";
                            echo "<td>" . $row['time'] . "</td>";
                            echo "<td>" . $row['crm'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";                            
                echo "</table>";
                echo '</div>';
                echo '
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
                <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>
  
                <style>
                .dt-button {
                    position: relative;
                    float: right;
                    margin-left: 10px;
                    margin-bottom: 10px;
                    top: 0;
                    right: 50%;
                  }
                  
                  @media screen and (max-width: 767px) {
                    .dt-buttons {
                      margin-top: 10px;
                    }
                    .dt-button {
                      float: none;
                      margin-left: 0;
                      margin-bottom: 5px;
                      display: block;
                    }
                  }
                </style>
  
                <script>
                $(document).ready(function() {
                    $("#tableidy").DataTable({
                        "scrollX": true,
                        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                        "dom": "lBfrtip",
                        buttons: [
                            {
                                extend: "print",
                                text: "Print",
                                className: "btn-primary"
                            },
                          
                            {
                                extend: "excel",
                                text: "Excel",
                                className: "btn-primary",
                                exportOptions: {
                                    columns: `:visible`
                                },
                                customize: function (xlsx) {
                                    var sheet = xlsx.xl.worksheets[\'sheet1.xml\'];
                                    $(\'row c[r^="C"]\', sheet).attr(\'s\', \'2\');
                                }
                            }
                        ]
                    });
                });
                </script>
  ';
                      // Free result set
                      mysqli_stmt_free_result($stmt);
                      mysqli_close($link);
                  // } else{
                  //     echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                  // }
              } else{
                  echo "Oops! No data found.";
              }
      
            }
        }
      }
    }
  }  
  
  //for summery report 

  if (isset($_POST["froms"]) && isset($_POST["tos"])) {
    require_once "config.php";
    
   
          $tos = $_POST["tos"];
     
          $froms = $_POST["froms"];
          
      
      
      
      
      // Check input errors before inserting in database
      if(!empty($tos) && !empty($froms) ){
        
          // Prepare an insert statement
          $sql = "SELECT date , type ,COUNT(actid) as visit , COUNT(CASE WHEN sr = 'Yes' THEN 1 ELSE NULL END) as 'sr' , COUNT(CASE WHEN requirement = 'Yes' THEN 1 ELSE NULL END) as 'requirement', COUNT(CASE WHEN billed = 'Happy' THEN 1 ELSE NULL END) as billed, COUNT(CASE WHEN advance = 'Yes' THEN 1 ELSE NULL END) as 'advance' , COUNT(CASE WHEN orderst = 'Yes' THEN 1 ELSE NULL END) as 'orderst' , COUNT(CASE WHEN walkout = 'Yes' THEN 1 ELSE NULL END) as 'walkout' FROM act where date between ? and ? GROUP by date , Type; ";
          
  
  
           
          if($stmt = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "ss", $param_from, $param_to );
              
              // Set parameters
              $param_from = $froms;
              $param_to = $tos;

  
              
              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                  // Records created successfully. Redirect to landing page
                  $result = mysqli_stmt_get_result($stmt);
                  
                  // Records deleted successfully. Redirect to landing page
                  // if(mysqli_stmt_num_rows($stmt) > 0){
                  if(mysqli_num_rows($result) > 0){     
                    echo '<div id="myTableWrapperx" >' ;
                    echo '<table id= "tableidz"class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">';
                                    echo '<thead class="thead-dark">';
                        echo "<tr>";
                            echo "<th>Date</th>";
                            echo "<th>Type</th>";
                            echo "<th>Visit</th>";
                            echo "<th>Status</th>";
                            echo "<th>Service/Repair</th>";
                            echo "<th>Requirement</th>";
                            echo "<th>Advance</th>";
                            echo "<th>Order</th>";
                            echo "<th>Walk Out</th>";

                            
                       
                         
                            
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['type'] . "</td>";
                            echo "<td>" . $row['visit'] . "</td>";
                            echo "<td>" . $row['billed'] . "</td>";
                            echo "<td>" . $row['sr'] . "</td>";
                            echo "<td>" . $row['requirement'] . "</td>";
                            echo "<td>" . $row['advance'] . "</td>";
                            echo "<td>" . $row['orderst'] . "</td>";
                            echo "<td>" . $row['walkout'] . "</td>";
                            
                        echo "</tr>";
                    }
                    echo "</tbody>";                            
                echo "</table>";
                echo '</div>';
                echo '
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
                <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>
  
                <style>
                .dt-button {
                    position: relative;
                    float: right;
                    margin-left: 10px;
                    margin-bottom: 10px;
                    top: 0;
                    right: 50%;
                  }
                  
                  @media screen and (max-width: 767px) {
                    .dt-buttons {
                      margin-top: 10px;
                    }
                    .dt-button {
                      float: none;
                      margin-left: 0;
                      margin-bottom: 5px;
                      display: block;
                    }
                  }
                </style>
  
                <script>
                $(document).ready(function() {
                    $("#tableidz").DataTable({
                        "scrollX": true,
                        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                        "dom": "lBfrtip",
                        buttons: [
                            {
                                extend: "print",
                                text: "Print",
                                className: "btn-primary"
                            },
                          
                            {
                                extend: "excel",
                                text: "Excel",
                                className: "btn-primary",
                                exportOptions: {
                                    columns: `:visible`
                                },
                                customize: function (xlsx) {
                                    var sheet = xlsx.xl.worksheets[\'sheet1.xml\'];
                                    $(\'row c[r^="C"]\', sheet).attr(\'s\', \'2\');
                                }
                            }
                        ]
                    });
                });
                </script>
  ';
                      // Free result set
                      mysqli_stmt_free_result($stmt);
                      mysqli_close($link);
                  // } else{
                  //     echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                  // }
              } else{
                  echo "Oops! No data found.";
              }
      
            }
        }
      }
    }


    //cumalitive report


    if (isset($_POST["cdate"]) && isset($_POST["csdate"])) {
        require_once "config.php";
        
       
              $tos = $_POST["csdate"];
         
              $froms = $_POST["cdate"];
              
          
          
          
          
          // Check input errors before inserting in database
          if(!empty($tos) && !empty($froms) ){
            
              // Prepare an insert statement
              $sql = "SELECT  type ,COUNT(actid) as visit , COUNT(CASE WHEN sr = 'Yes' THEN 1 ELSE NULL END) as 'sr' , COUNT(CASE WHEN requirement = 'Yes' THEN 1 ELSE NULL END) as 'requirement', COUNT(CASE WHEN billed = 'Happy' THEN 1 ELSE NULL END) as billed, COUNT(CASE WHEN advance = 'Yes' THEN 1 ELSE NULL END) as 'advance' , COUNT(CASE WHEN orderst = 'Yes' THEN 1 ELSE NULL END) as 'orderst' , COUNT(CASE WHEN walkout = 'Yes' THEN 1 ELSE NULL END) as 'walkout' FROM act where date between ? and ? GROUP by  Type; ";
              
      
      
               
              if($stmt = mysqli_prepare($link, $sql)){
                  // Bind variables to the prepared statement as parameters
                  mysqli_stmt_bind_param($stmt, "ss", $param_from, $param_to );
                  
                  // Set parameters
                  $param_from = $froms;
                  $param_to = $tos;
    
      
                  
                  // Attempt to execute the prepared statement
                  if(mysqli_stmt_execute($stmt)){
                      // Records created successfully. Redirect to landing page
                      $result = mysqli_stmt_get_result($stmt);
                      
                      // Records deleted successfully. Redirect to landing page
                      // if(mysqli_stmt_num_rows($stmt) > 0){
                      if(mysqli_num_rows($result) > 0){     
                        echo '<div id="myTableWrapperx" >' ;
                        echo '<table id= "tableidz"class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">';
                                        echo '<thead class="thead-dark">';
                            echo "<tr>";
                                echo "<th>Type</th>";
                                echo "<th>Visit</th>";
                                echo "<th>Status</th>";
                                echo "<th>Service/Repair</th>";
                                echo "<th>Requirement</th>";
                                echo "<th>Advance</th>";
                                echo "<th>Order</th>";
                                echo "<th>Walk Out</th>";
    
                                
                           
                             
                                
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                                echo "<td>" . $row['type'] . "</td>";
                                echo "<td>" . $row['visit'] . "</td>";
                                echo "<td>" . $row['billed'] . "</td>";
                                echo "<td>" . $row['sr'] . "</td>";
                                echo "<td>" . $row['requirement'] . "</td>";
                                echo "<td>" . $row['advance'] . "</td>";
                                echo "<td>" . $row['orderst'] . "</td>";
                                echo "<td>" . $row['walkout'] . "</td>";
                                
                            echo "</tr>";
                        }
                        echo "</tbody>";                            
                    echo "</table>";
                    echo '</div>';
                    echo '
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
                    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
                    <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
                    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
                    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>
      
                    <style>
                    .dt-button {
                        position: relative;
                        float: right;
                        margin-left: 10px;
                        margin-bottom: 10px;
                        top: 0;
                        right: 50%;
                      }
                      
                      @media screen and (max-width: 767px) {
                        .dt-buttons {
                          margin-top: 10px;
                        }
                        .dt-button {
                          float: none;
                          margin-left: 0;
                          margin-bottom: 5px;
                          display: block;
                        }
                      }
                    </style>
      
                    <script>
                    $(document).ready(function() {
                        $("#tableidz").DataTable({
                            "scrollX": true,
                            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                            "dom": "lBfrtip",
                            buttons: [
                                {
                                    extend: "print",
                                    text: "Print",
                                    className: "btn-primary"
                                },
                              
                                {
                                    extend: "excel",
                                    text: "Excel",
                                    className: "btn-primary",
                                    exportOptions: {
                                        columns: `:visible`
                                    },
                                    customize: function (xlsx) {
                                        var sheet = xlsx.xl.worksheets[\'sheet1.xml\'];
                                        $(\'row c[r^="C"]\', sheet).attr(\'s\', \'2\');
                                    }
                                }
                            ]
                        });
                    });
                    </script>
      ';
                          // Free result set
                          mysqli_stmt_free_result($stmt);
                          mysqli_close($link);
                      // } else{
                      //     echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                      // }
                  } else{
                      echo "Oops! No data found.";
                  }
          
                }
            }
          }
        }

        // followup report

        if (isset($_POST["rfd"]) && isset($_POST["rtd"])) {
            require_once "config.php";
            
           
                  $tos = $_POST["rtd"];
             
                  $froms = $_POST["rfd"];
                  $type = $_POST["rtyp"];
                  

              
              
              
              // Check input errors before inserting in database
              if(!empty($tos) && !empty($froms) ){
                
                if($type == 1){
                    $sql = "SELECT * FROM `followup` WHERE createdat between ? and ?; ";  
                }elseif($type == 2){
                    $sql = "SELECT * FROM `followup` WHERE date(lastact) between ? and ? and status=0; ";
                }else{
                    $sql = "SELECT * FROM `followup` WHERE date(lastact) between ? and ? and status=1; ";
                }
                
                  
          
          
                   
                  if($stmt = mysqli_prepare($link, $sql)){
                      // Bind variables to the prepared statement as parameters
                      mysqli_stmt_bind_param($stmt, "ss", $param_from, $param_to, );
                      
                      // Set parameters
                      $param_from = $froms;
                      $param_to = $tos;
        
          
                      
                      // Attempt to execute the prepared statement
                      if(mysqli_stmt_execute($stmt)){
                          // Records created successfully. Redirect to landing page
                          $result = mysqli_stmt_get_result($stmt);
                          
                          // Records deleted successfully. Redirect to landing page
                          // if(mysqli_stmt_num_rows($stmt) > 0){
                          if(mysqli_num_rows($result) > 0){     
                            echo '<div id="myTableWrapperx" >' ;
                            echo '<table id= "tableidz"class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">';
                                            echo '<thead class="thead-dark">';
                                echo "<tr>";
                                    echo "<th>Cutomer Name</th>";
                                    echo "<th>Mobile</th>";
                                    echo "<th>Last Remarks</th>";
                                    echo "<th>Remarks History</th>";
                                    echo "<th>Creat Date</th>";
        
                                    
                               
                                 
                                    
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>" . $row['castname'] . "</td>";
                                    echo "<td>" . $row['cast_mob'] . "</td>";
                                    echo "<td>" . $row['remarks'] . "</td>";
                                    echo "<td>" . $row['remarks_his'] . "</td>";
                                    echo "<td>" . $row['createdat'] . "</td>";
                                    
                                echo "</tr>";
                            }
                            echo "</tbody>";                            
                        echo "</table>";
                        echo '</div>';
                        echo '
                        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                        <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
                        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
                        <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
                        <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
                        <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>
          
                        <style>
                        .dt-button {
                            position: relative;
                            float: right;
                            margin-left: 10px;
                            margin-bottom: 10px;
                            top: 0;
                            right: 50%;
                          }
                          
                          @media screen and (max-width: 767px) {
                            .dt-buttons {
                              margin-top: 10px;
                            }
                            .dt-button {
                              float: none;
                              margin-left: 0;
                              margin-bottom: 5px;
                              display: block;
                            }
                          }
                        </style>
          
                        <script>
                        $(document).ready(function() {
                            $("#tableidz").DataTable({
                                "scrollX": true,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                "dom": "lBfrtip",
                                buttons: [
                                    {
                                        extend: "print",
                                        text: "Print",
                                        className: "btn-primary"
                                    },
                                  
                                    {
                                        extend: "excel",
                                        text: "Excel",
                                        className: "btn-primary",
                                        exportOptions: {
                                            columns: `:visible`
                                        },
                                        customize: function (xlsx) {
                                            var sheet = xlsx.xl.worksheets[\'sheet1.xml\'];
                                            $(\'row c[r^="C"]\', sheet).attr(\'s\', \'2\');
                                        }
                                    }
                                ]
                            });
                        });
                        </script>
          ';
                              // Free result set
                              mysqli_stmt_free_result($stmt);
                              mysqli_close($link);
                          // } else{
                          //     echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                          // }
                      } else{
                          echo "Oops! No data found.";
                      }
              
                    }
                }
              }
            }

?>
                            
                            </div>
                        </div>
                    </div>
                </main>

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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        
    </body>
</html>
