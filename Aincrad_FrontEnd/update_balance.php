<?php
session_start();
require 'connect.php'; // Replace with your actual database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode the incoming JSON request
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($_SESSION['Customer_Username']) || !isset($_SESSION['Login_Time'])) {
        echo json_encode(['error' => 'Invalid session or login time not set.']);
        exit;
    }

    $username = $_SESSION['Customer_Username'];
    $loginTime = $_SESSION['Login_Time'];
    $currentTime = time();

    // Calculate elapsed time since login
    $elapsedTime = $currentTime - $loginTime;

    // Function to calculate payment based on elapsed time
    function calculatePayment($elapsedTime) {
        if ($elapsedTime <= 20 * 60) {
            return 20; // ₱20 for the first 20 minutes
        } else {
            $extraTime = $elapsedTime - 20 * 60;
            $additionalMinutes = floor($extraTime / 60);
            return 20 + ($additionalMinutes * 0.67); // ₱0.67 per additional minute
        }
    }

    // Get the current balance from the database
    $balanceQuery = mysqli_query($conn, "SELECT Customer_Balance FROM `customer` WHERE Customer_Username = '$username'");
    if (!$balanceQuery || mysqli_num_rows($balanceQuery) === 0) {
        echo json_encode(['error' => 'Failed to fetch balance from database.']);
        exit;
    }

    $balanceRow = mysqli_fetch_assoc($balanceQuery);
    $currentBalance = floatval($balanceRow['Customer_Balance']);

    // Calculate payment and new balance
    $payment = calculatePayment($elapsedTime);
    $newBalance = $currentBalance - $payment;

    // Ensure balance doesn't go negative
    if ($newBalance < 0) {
        echo json_encode(['error' => 'Insufficient balance.']);
        exit;
    }

    // Update the database with the new balance
    $updateQuery = "UPDATE `customer` SET `Customer_Balance` = '$newBalance' WHERE `Customer_Username` = '$username'";
    if (mysqli_query($conn, $updateQuery)) {
        echo json_encode(['success' => true, 'balance' => $newBalance, 'payment' => $payment]);
    } else {
        echo json_encode(['error' => 'Failed to update balance in database.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
