<?php
include("connect.php"); // Include your database connection

// Get the JSON data sent from JavaScript
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['balance']) && isset($_SESSION['Customer_Username'])) {
    $balance = $data['balance'];
    $username = $_SESSION['Customer_Username'];

    // Update the balance in the database
    $query = "UPDATE customer SET Customer_Balance = ? WHERE Customer_Username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ds", $balance, $username);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Balance updated successfully!";
    } else {
        echo "Failed to update balance.";
    }
} else {
    echo "Invalid request.";
}
?>
