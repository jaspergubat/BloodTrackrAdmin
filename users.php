<?php
// users.php
$servername = "your_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, profile_picture, name, home_address, blood_type FROM users";
$result = $conn->query($sql);

$users = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $users[] = $row;
  }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($users);
?>
