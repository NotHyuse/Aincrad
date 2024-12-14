<?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $query = "UPDATE Customer 
              SET Customer_FirstName='$first_name', Customer_LastName='$last_name', Customer_Username='$username', 
                  Customer_Birthday='$birthday', Customer_Email='$email', Customer_PhoneNumber='$phone' 
              WHERE Customer_ID_PK=$id";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Account updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update account: " . mysqli_error($conn);
    }

    header('Location: Admin_accounts.php');
    exit();
}
?>
