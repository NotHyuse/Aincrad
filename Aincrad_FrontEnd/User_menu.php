<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <a href="https://www.flaticon.com/free-icons/user" title="user icons"></a>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
  <title>UI Design</title>
  
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
      position: relative;
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

    .sidebar .menu-item:last-child {
      margin-bottom: 0;
    }

    .menu-item img {
      width: 30px;
      height: 30px;
      margin-right: 10px;
    }

    .menu-item a {
      font-size: 14px;
      font-weight: bold;
      color: white;
    }

    .main {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    @keyframes glow {
  0% {
    text-shadow: 0 0 50px purple, 0 0 100px purple, 0 0 200px purple;
  }
  50% {
    text-shadow: 0 0 100px purple, 0 0 200px purple, 0 0 200px purple;
  }
  100% {
    text-shadow: 0 0 50px purple, 0 0 100px purple, 0 0 200px purple;
  }
}

    .main h1,h2 {
    margin: 0;
    line-height: .8;
    color: white;
    font-family: 'League Spartan';
    animation: glow 2s infinite;
}

    .main h1 {
      font-size: 100px;
      font-weight: bold;
      margin-bottom: 0;
      font-family: 'League Spartan';
    }

    .main h2 {
      font-size: 30px;
      font-weight: bold;
      margin-bottom: 10px;
      margin-right: 30px;
    }


    .main .logo {
      width: 200px;
      height: 100px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 18px;
      font-weight: bold;
    }

    .window-close {
      position: absolute;
      top: 10px;
      right: 20px;
      font-size: 18px;
      cursor: pointer;
    }

    .main .logo img {
     width: 300px;
    height: 200px;
    margin-top: 100px;
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
    .Logout {
      grid-column: span 2;
      display: flex;
      justify-content: right;
    }
    .Logout button a{
        color: black;
        border: none;
        background: none;
        text-align: center;
        display: block;
        font-size: 20px;
        margin: 0;
        cursor: pointer;
        border-radius: 20px;
        width: 150px;
        position: absolute;
        bottom: 30px;
        text-decoration: none;
        background-color: white;
        padding: 7px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .Logout button:hover {
      color: whitesmoke;
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
    <div class="main">
      <h1>Welcome</span></h1>
      <h2>BACK!</h2>
      <div class="logo">
        <img src="Logo.png" alt="Logo">
      </div>
      <div class="Logout">
        <button><a href = "logout.php">LOG OUT</button>
      </div>
    </div>
  </div>
</body>
</html>
