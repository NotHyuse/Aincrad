<?php
session_start();
include("connect.php");

// Server_Load_account.php (Handles getting user details)
if (isset($_POST['DETAILS'])) {
    $username = $_POST['username'];
    $username = mysqli_real_escape_string($conn, $username);

    $sql = "SELECT * FROM customer WHERE Customer_Username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['loaded_user'] = $row;  // Store in session
        echo json_encode($row); // Send data back as JSON
    } else {
        echo json_encode(["error" => "User Not Found"]);
    }
    exit; // Stop further processing of this script
}