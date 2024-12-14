<?php
session_start();  // Important: Start the session
include("connect.php");

// ... (Database connection code) ...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if(isset($_POST["product"])){
       $productId = $_POST["product"];
       $userId = $_SESSION['user_id'];

       // Validate and sanitize input ...

       $stmt = $connect->prepare("UPDATE users SET selected_product = ? WHERE user_id = ?");
       $stmt->bind_param("si", $productId, $userId);


       if($stmt->execute()){
          echo "Product selected successfully";
       }else {
           echo "Error";
       }
   }

}

?>