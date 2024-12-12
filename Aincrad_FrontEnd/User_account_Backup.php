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
const loginTime = <?php echo isset($_SESSION['Login_Time']) ? $_SESSION['Login_Time'] : 'null'; ?>;
let balance = <?php 
    if (isset($_SESSION['Customer_Username'])) {
        $username = $_SESSION['Customer_Username'];
        $query = mysqli_query($conn, "SELECT Customer_Balance FROM `customer` WHERE Customer_Username = '$username'");
        if ($query && mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_array($query);
            echo $row['Customer_Balance'];
        } else {
            echo '0';
        }
    } else {
        echo '0';
    }
?>;

let previousPayment = 0; // Track the previous payment to prevent duplicate updates
let initialDeductionSent = false; // Ensure the initial deduction is only sent once

function calculatePayment(elapsedTime) {
    let payment = 0;

    if (elapsedTime <= 20 * 60) {
        payment = 20;
    } else {
        const extraTime = elapsedTime - 20 * 60;
        const additionalMinutes = Math.floor(extraTime / 60);
        payment = 20 + (additionalMinutes * 0.67);
    }

    return payment.toFixed(2);
}

function updateElapsedTime() {
    const currentTime = Math.floor(Date.now() / 1000);
    const elapsedTime = currentTime - loginTime;

    const hours = Math.floor(elapsedTime / 3600);
    const minutes = Math.floor((elapsedTime % 3600) / 60);
    const seconds = elapsedTime % 60;

    const displayTime = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    document.getElementById('duration-time').textContent = displayTime;

    const payment = calculatePayment(elapsedTime);
    const updatedBalance = balance - parseFloat(payment);

    // Reflect the updated balance on the frontend
    document.getElementById('payment').textContent = `₱${payment}`;
    document.getElementById('balance').textContent = `₱${updatedBalance.toFixed(2)}`;

    // Only send the update after the balance has been displayed
    if (!initialDeductionSent) {
        updateBalanceOnServer(updatedBalance);
        initialDeductionSent = true;
    }

    if (payment !== previousPayment) {
        previousPayment = payment; // Update the previous payment value
        updateBalanceOnServer(updatedBalance); // Send updated balance to server
    }
}

function updateBalanceOnServer(updatedBalance) {
    fetch("update_balance.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify({ balance: updatedBalance }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.error) {
                console.error('Server error:', data.error);
            } else if (data.success) {
                console.log('Balance updated successfully:', data.balance);
            }
        })
        .catch((error) => {
            console.error('Communication error:', error);
        });
}

if (loginTime !== null) {
    // Update elapsed time every second
    setInterval(() => {
        updateElapsedTime();
    }, 1000);
} else {
    document.getElementById('duration-time').textContent = 'N/A';
    document.getElementById('payment').textContent = '₱0';
    document.getElementById('balance').textContent = `₱${balance.toFixed(2)}`;
}
</script>
</body>
</html>
