<?php
session_start();
include("connect.php");


if (isset($_POST['spending'])) {
    $currentSpending = floatval($_POST['spending']);
    $previousSpending = floatval($_SESSION['Previous_Payment']); // Get previous spending
    if ($currentSpending > $previousSpending) {
        $difference = $currentSpending - $previousSpending;
        $_SESSION['Previous_Payment'] = $currentSpending; 
            $username = $_SESSION['Customer_Username'];
            $query = "UPDATE customer SET Customer_Balance = Customer_Balance - $difference WHERE Customer_Username = '$username'"; 
            $updateResult = mysqli_query($conn, $query); // Execute update query

            if ($updateResult) {
                $balanceQuery = mysqli_query($conn, "SELECT Customer_Balance FROM customer WHERE Customer_Username = '$username'");
                $balanceRow = mysqli_fetch_assoc($balanceQuery);
                $updatedBalance = floatval($balanceRow['Customer_Balance']);
                echo $updatedBalance; // Return the updated balance
            } else {
                echo "Error updating balance: " . mysqli_error($conn);
            }
        } else {
            // Retrieve and return the current balance even if no update is performed
            if (isset($_SESSION['Customer_Username'])) {
                $username = $_SESSION['Customer_Username'];
                $query = mysqli_query($conn, "SELECT Customer_Balance FROM customer WHERE Customer_Username = '$username'");
                if ($query && mysqli_num_rows($query) > 0) {
                    $row = mysqli_fetch_assoc($query);
                    $currentBalance = floatval($row['Customer_Balance']);
                    echo $currentBalance;
                } else {
                    echo 0; // Or handle error as needed
                }
            } else {
                echo 0; // Or handle as appropriate
            }
        }

} else {
    // Handle the initial page load - retrieve and display the current balance
    if (isset($_SESSION['Customer_Username'])) {
        $username = $_SESSION['Customer_Username'];
        $query = mysqli_query($conn, "SELECT Customer_Balance FROM `customer` WHERE Customer_Username = '$username'");
        if ($query && mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            echo $row['Customer_Balance'];
        } else {
            echo 0; // Or an appropriate default value
        }
    } else {
        echo 0; // Handle the case where no user is logged in
    }
}
?>
