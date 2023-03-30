<?php
// Include the configuration file with the database connection
include('config.php');
session_start();

// Get the username from the session
$username = $_SESSION['username'];

// Get the chat message from the POST request
$message = $_POST['message'];

// Insert the chat message and username into the chat table
$query = "INSERT INTO chat (user, msg) VALUES ('$username', '$message')";
$result = mysqli_query($link, $query);

if ($result) {
  // If the insert query was successful, return the new chat message
  echo '<div class="chat-message">' . $username . ': ' . $message . '</div>';
} else {
  // If the insert query failed, return an error message
  echo '<div class="error-message">Error: Failed to insert chat message.</div>';
}
?>
