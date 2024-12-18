<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
  <title>Price Rate UI</title>
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
      color: white;
      margin-left: 30px;
      margin-top: 20px;
      font-family: 'League Spartan';
    }

    .form-container {
      display: flex;
      flex: 1;
      overflow-y: auto;
      gap: 20px;
      margin-bottom: 100px;
    }

    .form {
      flex: 1;
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 10px;
      overflow-y: auto;
      max-height: 350px;
      padding-right: 10px;
    }

    .form .time-period,
    .form .price-rate {
      padding: 10px;
      border-radius: 5px;
      font-size: 14px;
      text-align: left;
      width: 70%;
      height: 40px;
      color: white;
      margin-left: 20px;
    }


    .confirm-button {
      position: absolute;
      bottom: 20px;
      right: 30px;
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
      transform: scale(1.05);
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
            <img src="hourglass.png" alt="Hour Package">
            <a href="Hour Package.php" class="click">HOUR PACKAGE</a>
          </div>
          <div class="menu-item">
            <img src="restaurant.png" alt="Food Menu">
            <a href="Food Menu.php" class="click">FOOD MENU</a>
          </div>
        </div>  
    <div class="content">
      <h1>Price Rate</h1>
      <div class="form-container">
        <div class="form">
        <label style="color: white; margin-left: 30px;" for="Time Period">Time Period</label>
        <label style="color: white; margin-left: 10px;" for="Price Rate">Price Rate</label>
          <div class="time-period">08:00 AM - 9:00 AM</div>
          <div class="price-rate">₱39</div>
          <div class="time-period">9:00 AM - 10:00 AM</div>
          <div class="price-rate">₱39</div>
          <div class="time-period">10:00 AM - 11:00 AM</div>
          <div class="price-rate">₱39</div>
          <div class="time-period">11:00 AM - 12:00 PM</div>
          <div class="price-rate">₱39</div>
          <div class="time-period">12:00 PM - 01:00 PM</div>
          <div class="price-rate">₱39</div>
          <div class="time-period">01:00 PM - 02:00 PM</div>
          <div class="price-rate">₱39</div>
          <div class="time-period">02:00 PM - 03:00 PM</div>
          <div class="price-rate">₱39</div>
        </div>
        <div class="scrollbar">
          <div class="thumb"></div>
        </div>
      </div>
      <div class="confirm-button">
        <button><a href="User_menu.php" style="text-decoration: none; color: black;">CONFIRM</a></button>
      </div>
      <div class="close-button"><a href="User_menu.php">✖</a></div>
    </div>
  </div>
</body>
</html>
