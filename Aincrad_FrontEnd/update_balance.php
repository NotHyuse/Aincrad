<?php
session_start();
include("connect.php");

// Ensure session tracking for spending
if (!isset($_SESSION['Previous_Payment'])) {
    $_SESSION['Previous_Payment'] = 0.0;
}

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (isset($data['spending']) && isset($_SESSION['Customer_Username'])) {
        $currentSpending = round(floatval($data['spending']), 2);
        $previousSpending = round(floatval($_SESSION['Previous_Payment']), 2);

        // Check if spending has increased
        if ($currentSpending > $previousSpending) {
            $difference = $currentSpending - $previousSpending;
            $_SESSION['Previous_Payment'] = $currentSpending; // Update session spending tracker

            $username = $_SESSION['Customer_Username'];
            $query = mysqli_query($conn, "SELECT Customer_ID_PK, Customer_Balance FROM `customer` WHERE Customer_Username = '$username'");

            if ($query && mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                $customerID = $row['Customer_ID_PK'];
                $currentBalance = round(floatval($row['Customer_Balance']), 2);

                // Calculate the new balance and validate
                $updatedBalance = $currentBalance - $difference;
                if ($updatedBalance < 0) {
                    echo json_encode(['error' => 'Insufficient balance']);
                    exit;
                }

                // Update the balance in the database
                $updateQuery = mysqli_query($conn, "UPDATE `customer` SET Customer_Balance = $updatedBalance WHERE Customer_ID_PK = $customerID");

                if ($updateQuery) {
                    // Log the transaction using Customer_ID_FK
                    $logQuery = mysqli_query($conn, "INSERT INTO `transaction_log` (Customer_ID_FK, Spending, New_Balance, Timestamp) 
                        VALUES ($customerID, $difference, $updatedBalance, NOW())");

                    if ($logQuery) {
                        echo json_encode(['success' => true, 'balance' => $updatedBalance]);
                    } else {
                        echo json_encode(['error' => 'Error logging transaction']);
                    }
                } else {
                    echo json_encode(['error' => 'Error updating balance']);
                }
            } else {
                echo json_encode(['error' => 'User not found']);
            }
        } else {
            echo json_encode(['error' => 'No change in spending']);
        }
    } else {
        echo json_encode(['error' => 'Invalid request or session not set']);
    }
} else {
    echo json_encode(['error' => 'Invalid method']);
}
?>
