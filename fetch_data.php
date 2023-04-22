<?php
require_once 'config.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL);
ini_set('display_errors',1);
$day = $_GET['daylimit'];
$store = $_GET['store'];

$sql = "SELECT DATE(date) AS date, COUNT(actid) AS count FROM act WHERE date >= DATE(NOW() - INTERVAL " . $day . " DAY) and store = '" . $store . "'  GROUP BY DATE(date) ORDER BY DATE(date)";

$result = $link->query($sql);


$sqlx = "SELECT date, COUNT(CASE WHEN billed = 'UnHappy' THEN 1 ELSE NULL END) AS count_no, COUNT(CASE WHEN billed = 'Happy' THEN 1 ELSE NULL END) AS count_yes FROM act WHERE date >= DATE(NOW() - INTERVAL " . $day . " DAY) and  store = '" . $store . "' GROUP BY date;";
$resultx = $link->query($sqlx); 
// Store the data in arrays
$labels = array();
$data = array();
$labelsx = array();
$datax1 = array();
$datax2 = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($labels, $row["date"]);
        array_push($data, $row["count"]);
    }
}

if ($resultx->num_rows > 0) {
    while ($row = $resultx->fetch_assoc()) {
        array_push($labelsx, $row["date"]);
        array_push($datax1, $row["count_yes"]);
        array_push($datax2, $row["count_no"]);

    }
}

// Close the database connection
$link->close();

// Return the data in JSON format
$response = array("labels" => $labels, "data" => $data , "labelsx" => $labelsx, "datax1" => $datax1 , "datax2" => $datax2);
echo json_encode($response);




?>

 