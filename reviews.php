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

// Fetch reviews from database
$search = isset($_GET['search']) ? $_GET['search'] : '';
$searchQuery = $search ? "WHERE name LIKE '%$search%' OR review LIKE '%$search%'" : '';

$sql = "SELECT id, profile_picture, name, date, review FROM reviews $searchQuery";
$result = $conn->query($sql);

$reviews = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $reviews[] = $row;
  }
}

$conn->close();

echo json_encode($reviews);
?>
