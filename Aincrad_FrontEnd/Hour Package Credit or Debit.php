<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
  <title>Hour Package Buy</title>
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
    background-size: cover;
    background-position: center;
    }

    .container {
      width: 800px;
      height: 500px;
      display: flex;
      background: url(background.png);
      opacity: 0.9;
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
      display: flex;
      flex-direction: column;
    }

    .content h1 {
      font-size: 40px;
      font-weight: bold;
      margin-bottom: 20px;
      margin-left: 30px;
      margin-top: 20px;
      color: white;
      font-family: 'League Spartan';
    }

    .content h2 {
      font-size: 20px;
      font-weight: normal;
      margin-bottom:10px;
      margin-left: 30px;
      margin-top: 0px;
      color: white;
      font-family: 'League Spartan';
    }

    .payment-method-container {
        border: 1px solid #ccc;
        margin-left: 28px;
        width: 520px;
        height: 250px;
        padding: 10px 30px;
        border-radius: 8px;
        background: #f9f9f9;
    }

    .cash-or-debit {
        font-size: 18px;
        font-weight: bold;
        margin-left: 10px;
        margin-bottom: 10px;
        line-height: 20px;
        text-align: left;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .form-group label {
      font-weight: bold;
      font-size: 10px;
      color: black;
      margin-bottom: -5px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 20px;
      font-size: 10px;
      margin-bottom: 10px;
    }

    .form-row {
      display: inline;
      flex-direction: column;
      margin-right: 15px;
    }

    .form-row label {
      font-weight: bold;
      font-size: 10px;
      color: black;
      margin-right: 10px;
    }

    .form-row input {
      width: 30%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 20px;
      font-size: 10px;
      margin-bottom: 10px;
    }

    .form-group input[type="password"] {
      background-color: #f9f9f9;
    }

    .form-row input[type="password"] {
      background-color: #f9f9f9;
    }

    .form-actions {
      display: flex;
      justify-content: space-between;
      margin-top: 50px;
    }

    .form-actions button {
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-left: 50px;
    }

    .form-actions .go-back {
        background-color: white;
        color: black;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 20px 2px;
        cursor: pointer;
        border-radius: 20px;
        transition: background-color 0.3s, transform 0.3s; 
        margin-left: 180px;
        width: 150px;
        margin-bottom: 150px;
    }

    .form-actions .go-back:hover {
        background-color: white;
        transform: scale(1.05); 
    }

    .form-actions .confirm {
        background-color: white;
        color: black;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 20px 2px;
        cursor: pointer;
        border-radius: 20px;
        transition: background-color 0.3s, transform 0.3s; 
        width: 150px;
        margin-right: 20px;
        margin-bottom: 150px;
    }

    .form-actions .confirm:hover {
        background-color: white;
        transform: scale(1.05); 
    }

    .close-button {
      position: absolute;
      top: 10px;
      right: 20px;
      font-size: 18px;
      cursor: pointer;
      color: white;
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
            <a href="Hour Package.php" class="click">HOUR PACKAGE</a>
          </div>
          <div class="menu-item">
            <img src="restaurant.png" alt="Food Menu">
            <a href="Food Menu.html" class="click">FOOD MENU</a>
          </div>
        </div>
    <div class="content">
        <div class="header">
            <h1>Hour Package</h1>
            <h2>Select a Payment Method</h2>
        </div>

        <div class="payment-method-container">
          <div class="cash-or-debit">Credit or Debit Card</div>
          <div class="form-group">
            <label for="card-number">CARD NUMBER</label>
            <input type="password" id="credit-card" name="credit-card" placeholder="Enter Credit Card Here" required>
          </div>

          <div class="form-row">
            <label for="expiry-date">EXPIRY DATE</label>
            <input type="password" id="expiry-date" name="expiry-date" placeholder="Enter Expiry Date Here" required>
          </div>
          
          <div class="form-row">
            <label for="cvc">CVC</label>
            <input type="password" id="cvc" name="cvc" placeholder="Enter CVC Here" required>
          </div>

          <div class="form-group">
            <label for="name-of-the-card-holder">NAME OF THE CARD HOLDER</label>
            <input type="text" id="name" name="name" placeholder="Enter Name Here" required>
          </div>

          <div class="form-actions">
            <a href="Hour Package Payment Method.html"><button class="go-back">Go Back</button></a>
            <a href="Hour Package Buy.html"><button class="confirm">Confirm</button></a>
          </div>
        </div>
        
    </div>

      <div class="close-button"><a href="User_menu.php">✖</a></div>
    </div>
  </div>
</body>
</html>
