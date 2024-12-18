<?php
session_start();
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
  <title>Food Menu</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    
    * {
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
    margin: 0;
    }

    .container {
      width: 800px;
      height: 500px;
      display: flex;
      background: url(background.png);;
      opacity: 0.9;
      background-size: cover;
      background-position: center;
      box-shadow: 0 0 100px rgb(255, 255, 255);
      border-radius: 20px;
    }

    .sidebar {
      width: 20%;
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

    .main-content {
      flex-grow: 1;
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: white;
    }

    .header h2 {
      margin: 0;
      font-size: 40px;
      margin-left: 30px;
      margin-top: 20px;
      font-family: 'League Spartan';
    }

    .header button {
      border: none;
      background: none;
      font-size: 20px;
      cursor: pointer;
    }

    .items {
      margin-left: 10px;
      margin-top: 20px;
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .item {
      border: 1px solid #ccc;
      width: 150px;
      text-align: left;
      padding: 20px 10px;
      border-radius: 8px;
      background: #f9f9f9;
      line-height: 0.2;
    }

    .image-placeholder {
      width: 100px;
      height: 100px;
      background: #ddd;
      margin: 0 auto 10px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .add-btn {
      margin-top: 10px;
      display: block;
      margin-left: 120px;
      border: none;
      background: black;
      color: white;
      padding: 5px 10px;
      border-radius: 35px;
      cursor: pointer;
      font-weight: 700;
    }

    .add-btn:hover {
      background: #45a049;
      padding: 5px 10px;
      font-size: 16px;
      border: none;
      border-radius: 35px;
      cursor: pointer;
    }

    .navigation {
      text-align: right;
      margin-top: 20px;
    }

    .navigation button {
      border: none;
      background: black;
      padding: 10px;
      border-radius: 100%;
      cursor: pointer;
      width: 35px;
      color: white;
    }

    .navigation button:hover {
      background: green;
    }

    .footer {
      display: block;
      flex-direction: row;
      align-items: left;
      margin-top: 10px;
      margin-left: 20px;
      color: white;
    }

    .footer p {
      margin: 0 0 10px;
    }

    .cart-btn {
      border: none;
      background: whitesmoke;
      color: black;
      padding: 10px 40px;
      border-radius: 5px;
      cursor: pointer;
    }

    .cart-btn:hover {
      background: #333;
    }


    .close-button button {
      position: absolute;
      top: 10px;
      right: 20px;
      font-size: 18px;
      cursor: pointer;
      color: white;
      text-decoration: none;
    }

    .close-button a {
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

    <div class="main-content">
      <div class="header">
        <h2>Food Menu</h2>
        <div class="close-button"><a href="User_menu.php">✖</a></div>
      </div>
      

      <div class="items">
        <div class="item">
          <img src="fried chicken.jpg" alt="Item 1" class="image-placeholder">
          <td>Finger Foods</td>
          <p>₱ 0.00</p>
          <button class="add-btn">+</button>
        </div>
        <div class="item">
            <img src="chips.jpg" alt="Item 1" class="image-placeholder">
          <td>Snacks</td>
          <p>₱ 0.00</p>
        <button class="add-btn">+</button>
        </div>
        <div class="item">
            <img src="drinks.jpg" alt="Item 1" class="image-placeholder">
          <td>Bevarages</td>
          <p>₱ 0.00</p>
          <button class="add-btn">+</button>
        </div>
      </div>

      <div class="navigation">
        <button>&lt;</button>
        <button>&gt;</button>
      </div>

      <div class="footer">
        <p>Total: ₱ 0.00</p>
        <button class="cart-btn">View my cart</button>
      </div>
    </div>
  </div>


  <script>
    let total = 0;

    document.querySelectorAll('.add-btn').forEach((btn) => {
      btn.addEventListener('click', () => {
        total += 50; 
        updateTotal();
      });
    });
    function updateTotal() {
      document.querySelector('.footer p').textContent = `Total: ₱ ${total.toFixed(2)}`;
    }

    document.querySelector('.navigation button:nth-child(1)').addEventListener('click', () => {
      alert('Previous page');
    });

    document.querySelector('.navigation button:nth-child(2)').addEventListener('click', () => {
      alert('Next page');
    });

    document.querySelector('.cart-btn').addEventListener('click', () => {
      alert(`Total in cart: ₱ ${total.toFixed(2)}`);
    });
  </script>
</body>
</html>
