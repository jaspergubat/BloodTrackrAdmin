<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodtrackr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$reviewId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($reviewId) {
  $sql = "DELETE FROM reviews WHERE id = $reviewId";
  if ($conn->query($sql) === TRUE) {
    echo "success";
  } else {
    echo "error";
  }
} else {
  echo "invalid";
}

$conn->close();
?>
