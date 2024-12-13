<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
  <title>My Account UI</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url(wp.gif);
    opacity: 0.9;
    background-size: cover;
    background-position: center;
    }

    .container {
      width: 800px;
      height: 500px;
      display: flex;
      background: url(background.png);;
      background-size: cover;
      background-position: center;
      box-shadow: 0 0 100px rgb(255, 255, 255); 
      border-radius: 20px;
    }

    .sidebar {
      width: 23%;
      background: url(background.png);
      border-right: 2px solid #000;
      padding: 20px 10px;
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
    }

    .sidebar .menu-item {
      display: flex;
      align-items: center;
      margin-bottom: 50px;
      margin-top: 13px;
      margin-left: 10px;
    }
    
    .sidebar .menu-item a {
      font-size: 14px;
      font-weight: bold;
      color: white;
    }

    .menu-item img {
      width: 30px;
      height: 30px;
      margin-right: 10px;
    }

    .content {
      flex: 1;
      padding: 20px;
      position: relative;
    }

    .content h1 {
      font-size: 40px;
      font-weight: bold;
      margin-bottom: 20px;
      color: white;
      margin-left: 30px;
      margin-top: 20px;
      font-family: 'League Spartan';
    }

    .form {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 40px;
      color: white;
      margin-left: 30px;
    }

    .form label {
      font-weight: bold;
    }

    .form input {
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 100%;
    }

    .confirm-button {
      grid-column: span 2;
      display: flex;
      justify-content: right;
    }

    .confirm-button button {
      background-color: white;
        color: black;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 20px;
        transition: background-color 0.3s, transform 0.3s; 
        width: 150px;
        margin-right: 20px;
        margin-top: 40px;
        margin-bottom: 40px;
    }

    .confirm-button button:hover {
      background-color: white;
      transform: scale(1.1);
    }

    .close-button a {
      position: absolute;
      top: 10px;
      right: 20px;
      font-size: 18px;
      cursor: pointer;
      color: white;
      text-decoration: none;
    }

    .click {
    color: black;
    text-decoration: none; 
    font-weight: bold;
    font-size: 14px;
    }

    .click:hover {
    color: black; 
    text-decoration: underline;
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="sidebar">
      <div class="menu-item">
        <img src="user.png" alt="My Account">
        <a href="User_account.php" class="click">MY ACCOUNT</a>
      </div>
      <div class="menu-item">
        <img src="dollar-symbol.png" alt="Price Rate">
        <a href="Price_Rate.php" class="click">PRICE RATE</a>
      </div>
      <div class="menu-item">
        <img src="unlock.png" alt="Edit Password">
        <a href="Edit_Password.php" class="click">EDIT PASSWORD</a>
      </div>
      <div class="menu-item">
        <img src="credit-card.png" alt="Recharge Card">
        <a href="Recharge Card.html" class="click">RECHARGE CARD</a>
      </div>
      <div class="menu-item">
        <img src="hourglass.png" alt="Hour Package">
        <a href="Hour Package.html" class="click">HOUR PACKAGE</a>
      </div>
      <div class="menu-item">
        <img src="restaurant.png" alt="Food Menu">
        <a href="Food Menu.html" class="click">FOOD MENU</a>
      </div>
    </div>
    <div class="content">
      <h1>My Account</h1>
      <div class="form">
        <label for="name">Name: <?php 
        if(isset($_SESSION['Customer_Username'])){
        $username=$_SESSION['Customer_Username'];
        $query=mysqli_query($conn, "SELECT Customer_FirstName, Customer_LastName FROM `customer` WHERE customer.Customer_Username='$username'");
        while($row=mysqli_fetch_array($query)){
            echo $row['Customer_FirstName'] . ' ' . $row['Customer_LastName'];}}
            ?>
        </label>
        <label for="balance">Balance: <span id="balance">₱</span></label>

        <label for="account-id">Account ID: <?php 
        if(isset($_SESSION['Customer_Username'])){
        $username=$_SESSION['Customer_Username'];
        $query=mysqli_query($conn, "SELECT Customer_ID_PK FROM `customer` WHERE customer.Customer_Username='$username'");
        while($row=mysqli_fetch_array($query)){
            echo $row['Customer_ID_PK'];}}
            ?>
        </label>
        <label for="duration-time">Duration Time: <span id="duration-time"></span></label>
        <label for="account-ign">Account IGN:
          <?php echo $username; ?>
        </label>
        <label for="spending">Spending: <span id="payment"></span> </label>
        <label for="birthday">Birthday: <?php 
              if(isset($_SESSION['Customer_Username'])){
                $username=$_SESSION['Customer_Username'];
                $query=mysqli_query($conn, "SELECT Customer_Birthday FROM `customer` WHERE customer.Customer_Username='$username'");
                while($row=mysqli_fetch_array($query)){
                    echo $row['Customer_Birthday'];}}
          ?> 
        </label>
        <label for="phone-number">Phone Number: <?php 
              if(isset($_SESSION['Customer_Username'])){
                $username=$_SESSION['Customer_Username'];
                $query=mysqli_query($conn, "SELECT Customer_PhoneNumber FROM `customer` WHERE customer.Customer_Username='$username'");
                while($row=mysqli_fetch_array($query)){
                    echo $row['Customer_PhoneNumber'];}}
          ?>
        </label>
        <label for="email-address">Email: <?php 
              if(isset($_SESSION['Customer_Username'])){
                $username=$_SESSION['Customer_Username'];
                $query=mysqli_query($conn, "SELECT Customer_Email FROM `customer` WHERE customer.Customer_Username='$username'");
                while($row=mysqli_fetch_array($query)){
                    echo $row['Customer_Email'];}}
          ?></label>
        <div class="confirm-button">
          <button>CONFIRM</button>
        </div>
      </div>
      <div class="close-button"><a href="User_menu.php">✖</a></div>
    </div>
  </div>
  <script>
let previousPayment = 0; // Track the previous payment to prevent duplicate updates

function updateElapsedTime() {
    fetch('calculate_balance.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json; charset=utf-8',
        },
        body: JSON.stringify({ action: 'update_time' }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.error) {
                console.error('Server error:', data.error);
            } else {
                document.getElementById('duration-time').textContent = data.duration_time;
                document.getElementById('payment').textContent = `₱${data.payment}`;
                document.getElementById('balance').textContent = `₱${data.balance}`;

                if (data.payment !== previousPayment) {
                    previousPayment = data.payment; // Update the previous payment value
                }
            }
        })
        .catch((error) => {
            console.error('Communication error:', error);
        });
}

setInterval(() => {
    updateElapsedTime();
}, 1000);
  </script>
</body>
</html>
