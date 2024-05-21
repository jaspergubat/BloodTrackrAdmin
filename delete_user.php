<?php
// delete_user.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
  $userId = intval($_GET['id']);
  $sql = "DELETE FROM users WHERE id = $userId";

  if ($conn->query($sql) === TRUE) {
    echo "success";
  } else {
    echo "error";
  }
} else {
  echo "error";
}

$conn->close();
?>
