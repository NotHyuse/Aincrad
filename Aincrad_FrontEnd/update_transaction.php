<?php
session_start();
include("connect.php");

if (isset($_SESSION['selectedProduct'])) {
    $selectedProduct = $_SESSION['selectedProduct'];

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
    if (isset($_SESSION['Customer_Username'])) {  // Replace 'user_id' with your actual session variable
        $userId = $_SESSION['Customer_Username'];

        // Sanitize the input to prevent SQL injection (assuming $connect is your database connection)
        $Product_ID_FK = mysqli_real_escape_string($connect, $Product_ID_FK);

        // Update the database
        $sql = "INSERT INTO Transaction_Cart SET Product_ID_FK = '$Product_ID_FK' WHERE Customer_Username = '$username' AND Product_ID_FK IS NULL"; 

        if (mysqli_query($connect, $sql)) {
            // Success - redirect or display a message
            header("Location: Hour_Package_Order_Details.php");
            exit(); // Important to stop further execution after redirect
        } else {
            echo "Error updating record: " . mysqli_error($connect);
        }
    } else {
        echo "User ID not found in session.";
    }
} else {
    echo "No product selected.";
}
?>
