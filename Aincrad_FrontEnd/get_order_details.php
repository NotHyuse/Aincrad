<?php
session_start();
include("connect.php");

if (isset($_GET['id'])) {
  $transactionId = $_GET['id'];
  $sql = "SELECT * FROM Transaction WHERE Transaction_ID_PK = ?";
  $stmt = mysqli_prepare($conn, $sql);
  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $transactionId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result && mysqli_num_rows($result) > 0) {
      $orderDetails = mysqli_fetch_assoc($result);
      header('Content-Type: application/json'); //Important for javascript to parse response
      echo json_encode($orderDetails);
    } else{
      echo "No data found";
    }
    mysqli_stmt_close($stmt);
  }else {
    echo "Error";
  }
}
?>