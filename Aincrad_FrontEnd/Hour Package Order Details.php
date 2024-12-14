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
      margin-bottom: 60px;
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
      margin-bottom: 20px;
      margin-left: 30px;
      margin-top: 20px;
      color: white;
      font-family: 'League Spartan';
    }

    .product {
      border: 1px solid #ccc;
      width: 150px;
      padding: 15px;
      text-align: left;
      border-radius: 8px;
      background: #f9f9f9;
      line-height: 20px;
      margin-left: 28px;
    }

    .product .product-name {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 0px;
    }

    .product .product-duration {
      font-size: 12px;
      font-weight: normal;
      margin-bottom: 15px;
    }
    
    .product .product-price {
      font-size: 16px;
      font-weight: bold;
      margin-left: 70px;
    }

    .quantity-buttons {
      display: flex;
      flex-direction: row;
      justify-content: center;
      margin-right: 175px;
      margin-bottom: -5px;
    }

    .quantity-button {
      margin-top: -25px;
      display: inline-flex;
      border: none;
      background: rgb(255, 255, 255);
      color: rgb(0, 0, 0);
      padding: 5px 10px;
      border-radius: 35px;
      cursor: pointer;
      font-weight: 700;
      margin-left: 15px;
    }

    .quantity-button:hover {
      background: #45a049;
      padding: 5px 10px;
      font-size: 16px;
      border: none;
      border-radius: 35px;
      cursor: pointer;
    }

    .quantity {
        font-size: 16px;
        font-weight: bold;
        color: white;
        margin-left: 15px;
        margin-top: -15px;
    }

    .payment-method {
      border: 1px solid #ccc;
      margin-top: 10px;
      margin-left: 28px;
      width: 470px;
      height: 120px;
      padding: 15px 10px;
      border-radius: 8px;
      background: #f9f9f9;
      line-height: 20px;
    }

    .payment-method .payment-method-title {
      font-size: 18px;
      font-weight: bold;
    }

    .payment-method .type-of-payment {
      font-size: 12px;
      font-weight: normal;
      margin-top: 10px;
    }

    .go-back-button {
        background-color: whitesmoke;
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
        margin-left: 28px;
        width: 125px;
        margin-top: 8px;
        margin-bottom: -25px;
    }

    .form-actions {
      display: flex;
      justify-content: space-between;
      margin-top: 40px;
    }

    .form-actions button {
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .form-actions .cancel {
        background-color: whitesmoke;
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
        margin-left: 250px;
        width: 175px;
        margin-bottom: 150px;
    }

    .form-actions .cancel:hover {
        background-color: whitesmoke;
        transform: scale(1.05); 
    }

    .form-actions .confirm-payment {
        background-color: whitesmoke;
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
        width: 175px;
        margin-right: 20px;
        margin-bottom: 150px;
    }

    .form-actions .confirm-payment:hover {
        background-color: whitesmoke;
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
          <h2>Select Item</h2>
      </div>
    

    <div class="product">
        <div class="product-name">Product 1</div>
        <div class="product-duration">1 Hour</div>
        <div class="product-price">₱40.00</div>
    </div>

    <div class="quantity-buttons">
        <div class="quantity-button">-</div>
        <div class="quantity">1</div>
        <div class="quantity-button">+</div>
    </div>
      
    <div class="payment-method">
        <div class="payment-method-title">Payment Method</div>
        <div class="type-of-payment">Type of Payment:</div>
    </div>

    <div class="go-back-button">Go Back</div>

      <div class="form-actions">
        <a href="Hour Package.php"><button class="cancel">Cancel</button></a>
        <button class="confirm-payment">Confirm Payment</button>
      </div>

      <div class="close-button"><a href="User_menu.php">✖</a></div>
    </div>
  </div>
</body>
</html>
