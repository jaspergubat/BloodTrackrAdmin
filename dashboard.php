<?php
require 'db_connect.php';

// Fetch total number of registered users
$userQuery = "SELECT COUNT(*) AS total_users FROM users";
$userResult = $conn->query($userQuery);
$userData = $userResult->fetch_assoc();
$totalUsers = $userData['total_users'];

// Fetch total number of blood banks
$bloodBankQuery = "SELECT COUNT(*) AS total_blood_banks FROM blood_banks";
$bloodBankResult = $conn->query($bloodBankQuery);
$bloodBankData = $bloodBankResult->fetch_assoc();
$totalBloodBanks = $bloodBankData['total_blood_banks'];

header('Content-Type: application/json');
echo json_encode([
    'totalUsers' => $totalUsers,
    'totalBloodBanks' => $totalBloodBanks
]);
?>
