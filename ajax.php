<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once 'config.php';
require_once 'navbar.php';




if(isset($_GET['qr'])){
    $q = $_GET['qr'];
    if(isset($q) || !empty($q)) {
        $query = "SELECT id,cou_name FROM coustomeradd WHERE mobile_no = '$q'";
        $query2 = "SELECT id FROM castin WHERE mob = '$q'";
        $result = mysqli_query($link, $query);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $data = array("name" => $row["cou_name"] , "id" => $row["id"]) ;
             
            }
          } else {
            $data = array("name" => "No Data");

          }
          $result = mysqli_query($link, $query2);
        if ($result->num_rows > 0) {
            // output data of each row
            
              $data = array("status" => "in") ;
             
            
          } 
          $link->close();
          
          // return the data as a JSON object
          header('Content-Type: application/json');
          echo json_encode($data);
}
}
if(isset($_GET['cou_id'])){
  $q = $_GET['cou_id'];
  if(isset($q) || !empty($q)) {
      $query = "SELECT id,tgi,thc,time,mob,name,type FROM castin WHERE cou_id = '$q'";
      $result = mysqli_query($link, $query);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $data = array("mob" => $row["mob"] , "tgi" => $row["tgi"] , "thc" => $row["thc"] ,"type" => $row["type"], "intime" => $row["time"] , "id" => $row["id"] , "name" => $row["name"]) ;
           

          }
        } else {
          $data = array("mob" => "No Data");

        }
        
        $link->close();
        
        // return the data as a JSON object
        header('Content-Type: application/json');
        echo json_encode($data);
}
}

if(isset($_GET['mob'])){
  $q = $_GET['mob'];
  if(isset($q) || !empty($q)) {
      $query = "SELECT id FROM coustomeradd WHERE mobile_no = '$q'";

      $result = mysqli_query($link, $query);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $data = array("id" => $row["id"] ) ;
           

          }
        } else {
          $data = array("mob" => "No Data");

        }
        
        $link->close();
        
        // return the data as a JSON object
        header('Content-Type: application/json');
        echo json_encode($data);
}
}

if(isset($_GET['uname'])){
  $q = $_GET['uname'];
  if(isset($q) || !empty($q)) {
      $query = "SELECT id FROM users WHERE username = '$q'";

      $result = mysqli_query($link, $query);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $data = array("uname" => "not ok" ) ;
           

          }
        } else {
          $data = array("uname" => "ok");

        }
        
        $link->close();
        
        // return the data as a JSON object
        header('Content-Type: application/json');
        echo json_encode($data);
}
}
if(isset($_GET['uidd'])){
  $q = $_GET['uidd'];
  if(isset($q) || !empty($q)) {
      $query = "update users set status=0 where id = $q";
      mysqli_query($link, $query);
      logActivity('Update', 'Users', 'Disable User ' . $q .' by '.  $_SESSION["username"] , $_SESSION["id"] );

      echo '<script type="text/javascript">
      location.replace("userad.php");
      </script>';
     
}
}

if(isset($_GET['uide'])){
  $q = $_GET['uide'];
  if(isset($q) || !empty($q)) {
      $query = "update users set status=1 where id = $q";
      mysqli_query($link, $query);
      logActivity('Update', 'Users', 'Enable User ' . $q .' by '.  $_SESSION["username"] , $_SESSION["id"] );

      echo '<script type="text/javascript">
      location.replace("userad.php");
      </script>';
     
}
}
if(isset($_GET['exdd'])){
  $q = $_GET['exdd'];
  if(isset($q) || !empty($q)) {
      $query = "update executive set status=0 where id = $q";
      logActivity('Update', 'Executive', 'Disable Executive ' . $q .' by '.  $_SESSION["username"] , $_SESSION["id"] );

      mysqli_query($link, $query);
      echo '<script type="text/javascript">
      location.replace("exucread.php");
      </script>';
     
}
}

if(isset($_GET['exde'])){
  $q = $_GET['exde'];
  if(isset($q) || !empty($q)) {
      $query = "update executive set status=1 where id = $q";
      mysqli_query($link, $query);
      logActivity('Update', 'Executive', 'Enable Executive ' . $q .' by '.  $_SESSION["username"] , $_SESSION["id"] );

      echo '<script type="text/javascript">
      location.replace("exucread.php");
      </script>';
     
}
}
if(isset($_GET['asdd'])){
  $q = $_GET['asdd'];
  if(isset($q) || !empty($q)) {
      $query = "update associate set status=0 where id = $q";
      mysqli_query($link, $query);
      logActivity('Update', 'Associate', 'Disable Associate ' . $q .' by '.  $_SESSION["username"] , $_SESSION["id"] );

      echo '<script type="text/javascript">
      location.replace("assoread.php");
      </script>';
     
}
}

if(isset($_GET['asde'])){
  $q = $_GET['asde'];
  if(isset($q) || !empty($q)) {
      $query = "update associate set status=1 where id = $q";
      mysqli_query($link, $query);
      logActivity('Update', 'Associate', 'Enable Associate ' . $q .' by '.  $_SESSION["username"] , $_SESSION["id"] );

      echo '<script type="text/javascript">
      location.replace("assoread.php");
      </script>';
     
}
}
if(isset($_GET['prdd'])){
  $q = $_GET['prdd'];
  if(isset($q) || !empty($q)) {
      $query = "update product set status=0 where id = $q";
      mysqli_query($link, $query);
      logActivity('Update', 'Product', 'Disable product ' . $q .' by '.  $_SESSION["username"] , $_SESSION["id"] );

      echo '<script type="text/javascript">
      location.replace("prodread.php");
      </script>';
     
}
}

if(isset($_GET['prde'])){
  $q = $_GET['prde'];
  if(isset($q) || !empty($q)) {
      $query = "update product set status=1 where id = $q";
      mysqli_query($link, $query);
      logActivity('Update', 'Product', 'Enabled product ' . $q .' by '.  $_SESSION["username"] , $_SESSION["id"] );

      echo '<script type="text/javascript">
      location.replace("prodread.php");
      </script>';
     
}
}


if(isset($_GET['nid']) && $_GET['ack']){
  $q = $_GET['nid'];
  $x = $_GET['ack'];
  if(isset($q) || !empty($q)) {
      $query = "update notification set ack=concat(ack, '$x', ',') where id = $q and !FIND_IN_SET('$x', ack)";
      mysqli_query($link, $query);
      logActivity('Read', 'Notificaction', 'Read notification ' . $q .' by '.  $_SESSION["username"] , $_SESSION["id"] );
     
}
}

if(isset($_GET['nusername']) ){
  $q = $_GET['nusername'];
  if(isset($q) || !empty($q)) {
      $query = "SELECT count(id) FROM notification where status = 1 and  exptime >= NOW() and FIND_IN_SET('$q', user) and !FIND_IN_SET('$q', ack)";
      $result = mysqli_query($link, $query);

      $row = mysqli_fetch_row($result);
      $count = $row[0];
      echo $count;
     
}
}


if(isset($_GET['lusername']) ){
  $q = $_GET['lusername'];
  if(isset($q) || !empty($q)) {
    $sql = "SELECT id,time, fromuser, ack , sub, msg FROM notification where status = 1 and  exptime >= NOW() and FIND_IN_SET('$q', user)";
    $result = mysqli_query($link, $sql);
    
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    mysqli_free_result($result);
    mysqli_close($link);
    
    echo json_encode($data);
     
}
}

if(isset($_GET['type']) ){
  $q = $_GET['type'];
  // $id = $_GET['latest'];

  if($q == 1) {
    $sql = "select * from (SELECT id, time, user, msg FROM chat order by id desc LIMIT 20) var1 order by id;";
    $result = mysqli_query($link, $sql);
    
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    mysqli_free_result($result);
    mysqli_close($link);
    
    echo json_encode($data);
     
}
}

if(isset($_GET['DND'])){
  $q = $_GET['DND'];
  $id = $_GET['id'];
  if($q == "Yes") {
      $query = "update coustomeradd set DND='Yes' where id = $id;";
      mysqli_query($link, $query);
      logActivity('Update', 'Users', 'Start DND ' . $id .' by '.  $_SESSION["username"] , $_SESSION["id"] );

      echo '<script type="text/javascript">
      location.replace("cad.php");
      </script>';
     
}else{
  $query = "update coustomeradd set DND='No' where id = $id;";
      mysqli_query($link, $query);
      logActivity('Update', 'Users', 'Stop DND ' . $id .' by '.  $_SESSION["username"] , $_SESSION["id"] );

      echo '<script type="text/javascript">
      location.replace("cad.php");
      </script>';
}
}

if(isset($_GET['term'])){
  $searchTerm = $_GET['term'];
  $query = $link->query("SELECT * FROM country WHERE country_name LIKE '%".$searchTerm."%' AND status = 1 ORDER BY country_name ASC"); 
 
// Generate array with skills data 
$skillData = array(); 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
        $data['id'] = $row['id']; 
        $data['value'] = $row['country_name']; 
        array_push($skillData, $data); 
    } 
} 
 
// Return results as json encoded array 
echo json_encode($skillData);
}



$conn = $link;
if (! empty($_POST["keyword"])) {
  $sql = $conn->prepare("SELECT * FROM country WHERE country_name LIKE  ? AND status=1 ORDER BY country_name LIMIT 0,6");
  $search = "{$_POST['keyword']}%";
  $sql->bind_param("s", $search);
  $sql->execute();
  $result = $sql->get_result();
  if (! empty($result)) {
      ?>
<ul id="country-list">
<?php
      foreach ($result as $country) {
          ?>
 <li onClick="selectCountry('<?php echo $country["country_name"]; ?>');">
    <?php echo $country["country_name"]; ?>
  </li>
<?php
      }// end for
  ?>
</ul>
  <?php
  }// end if not empty
}

$conn = $link;
if (! empty($_POST["keystate"])) {
  $sql = $conn->prepare("SELECT * FROM state WHERE state_name LIKE  ? AND status=1 ORDER BY state_name LIMIT 0,6");
  $search = "{$_POST['keystate']}%";
  $sql->bind_param("s", $search);
  $sql->execute();
  $result = $sql->get_result();
  if (! empty($result)) {
      ?>
<ul id="state-list">
<?php
      foreach ($result as $state) {
          ?>
 <li onClick="selectState('<?php echo $state["state_name"]; ?>');">
    <?php echo $state["state_name"]; ?>
  </li>
<?php
      }// end for
  ?>
</ul>
  <?php
  }// end if not empty
}
?>
