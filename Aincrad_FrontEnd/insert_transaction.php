<?php
session_start();
include("connect.php");

if (isset($_POST['product']) && isset($_POST['price'])) {
    $selectedProduct = $_POST['product'];
    $productPrice = $_POST['price'];

    // Map selected product to Product_ID_FK
    $Product_ID_FK = null;
    switch ($selectedProduct) {
        case 'Product 1':
            $Product_ID_FK = 1;
            break;
        case 'Product 2':
            $Product_ID_FK = 2;
            break;
        case 'Product 3':
            $Product_ID_FK = 3;
            break;
        default:
            echo "Invalid product selection.";
            exit();
    }

    // Assuming you have a user ID stored in the session
    if (isset($_SESSION['Customer_Username'])) {
        $userId = $_SESSION['Customer_Username'];

        // Sanitize inputs to prevent SQL injection
        $Product_ID_FK = mysqli_real_escape_string($conn, $Product_ID_FK);
        $userId = mysqli_real_escape_string($conn, $userId);
        $productPrice = mysqli_real_escape_string($conn, $productPrice);

        // Insert into the Transaction_Cart table
        $sql = "INSERT INTO Transaction_Cart (Customer_Username, Product_ID_FK, Total_Amount_Paid) 
                VALUES ('$userId', '$Product_ID_FK', '$productPrice')";

        if (mysqli_query($conn, $sql)) {
            echo "success";  // Return success to the frontend
        } else {
            echo "Error inserting record: " . mysqli_error($conn);
        }
    } else {
        echo "User ID not found in session.";
    }
} else {
    echo "Invalid product data.";
}
?>
