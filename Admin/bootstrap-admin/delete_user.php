<?php
// Include your database connection file
$servername = "localhost"; // Replace with your MySQL server name
$username = "root";       // Replace with your MySQL username
$password = "";       // Replace with your MySQL password
$dbname = "quiz1";    // Replace with your MySQL database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['user-id'])) {
    $user_id = $_GET['user-id'];
  
    // Delete user details from the user table
    $sql = "DELETE FROM users WHERE user-id = '$user_id'";
    if ($conn->query($sql) === TRUE) {
      echo "User details deleted successfully.";
    } else {
      echo "Error deleting user details: " . $conn->error;
    }
  } else {
    echo "User ID not found in URL.";
  }
?>
