<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Include config file
require_once "config.php";
// Define an empty array to store the cast_id values
$cast_ids = array();

// Run the SQL query to select cast_id values from the act table
$result = mysqli_query($link, "select distinct (castid) FROM act WHERE MONTH(date) = MONTH(DATE_SUB(NOW(), INTERVAL 1 MONTH)) AND YEAR(date) = YEAR(DATE_SUB(NOW(), INTERVAL 1 MONTH))");

// Loop through the result set and store the cast_id values in the array
while ($row = mysqli_fetch_array($result)) {
    $cast_ids[] = $row['castid'];
}


foreach ($cast_ids as $cast_id) {
    // Run the SQL query to select rows from the act table where the cast_id matches the current $cast_id value
    $query = "SELECT * FROM act WHERE castid = '$cast_id'";
    $result = mysqli_query($link, $query);

    // If the query returns a single row, insert the record on the act_report table
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $query = "INSERT INTO act_report SELECT * FROM act WHERE actid = '$row[actid]'";
        mysqli_query($link, $query);
    } else {
        // If the query returns multiple rows, loop through the result set and check if the billeed or service column values meet certain conditions
        while ($row = mysqli_fetch_array($result)) {
            if ($row['billed'] == 'Happy' || $row['sr'] == 'Yes') {
                $query = "INSERT INTO act_report SELECT * FROM act WHERE actid = '$row[actid]'";
                mysqli_query($link, $query);
            }
        }
    }
}

// Close the MySQL connection
mysqli_close($link);

// Print the array of cast_id values
print_r($cast_ids);
?>