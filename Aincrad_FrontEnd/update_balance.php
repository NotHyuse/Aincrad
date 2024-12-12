<?php
session_start();
require 'connect.php'; // Replace with your actual database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode the incoming JSON request
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if balance is provided
    if (isset($data['balance']) && isset($_SESSION['Customer_Username'])) {
        $balance = floatval($data['balance']);
        $username = $_SESSION['Customer_Username'];

        // Update the database with the new balance
        $updateQuery = "UPDATE `customer` SET `Customer_Balance` = '$balance' WHERE `Customer_Username` = '$username'";
        if (mysqli_query($conn, $updateQuery)) {
            echo json_encode(['success' => true, 'balance' => $balance]);
        } else {
            echo json_encode(['error' => 'Failed to update balance in database.']);
        }
    } else {
        echo json_encode(['error' => 'Invalid request data or session expired.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
