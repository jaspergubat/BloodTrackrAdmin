<?php
include 'db_connect.php';

// Fetch total registered users
$sqlUsers = "SELECT COUNT(*) as totalUsers FROM users";
$resultUsers = $conn->query($sqlUsers);
$rowUsers = $resultUsers->fetch_assoc();
$totalUsers = $rowUsers['totalUsers'];

// Fetch total blood banks
$sqlBloodBanks = "SELECT COUNT(*) as totalBloodBanks FROM blood_banks";
$resultBloodBanks = $conn->query($sqlBloodBanks);
$rowBloodBanks = $resultBloodBanks->fetch_assoc();
$totalBloodBanks = $rowBloodBanks['totalBloodBanks'];

echo json_encode([
    'totalUsers' => $totalUsers,
    'totalBloodBanks' => $totalBloodBanks
]);

$conn->close();
?>
