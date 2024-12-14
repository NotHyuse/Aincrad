<?php 
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PC Management UI</title>
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
      transition: opacity 0.8s ease, visibility 0.8s ease;
    }
    .container.hidden {
    opacity: 0;
    visibility: hidden;
    }
    .pc-container {
    border: 2px solid white; 
    border-radius: 10px; 
    padding: 15px; 
    background-color: rgb(255, 255, 255); 
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); 
    gap: 10px;
    justify-items: center; 
    align-items: center;
    }


    .left-panel {
      flex: 2;
      padding: 20px;
      border-right: 2px solid white;
      display: flex;
      flex-direction: column;
    }

    .left-panel h1 {
      font-size: 30px;
      margin-bottom: 20px;
      color: white;
      margin-left: 20px;
    }

    .pc-list {
      display: flex;
      gap: 20px;
      margin-top: 10px;
    }

    .pc-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 5px;
    }

    .pc-item img {
      width: 50px;
      height: 50px;
      border: none;
      cursor: pointer;
    }

    .pc-item span {
      font-size: 14px;
      color: black;
    }

    .right-panel {
      flex: 1;
      border-left: 2px solid white;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 10px;
      position: relative;
    }

    .header {
      display: flex;
      flex-direction: column;
      align-items: left;
      font-size: 14px;
      margin-bottom: 20px;
      border-bottom: 2px solid white;
      padding-bottom: 10px;
      color: white;
    }

    .header span {
      margin: 5px 0;
    }

    .menu {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .menu-item {
      display: flex;
      align-items: center;
      border: none;
      width: 80%;
      height: 50px;
      margin: 0 auto;
      cursor: pointer;
      text-align: left;
      padding: 5px;
    }

    .menu-item img {
      width: 30px;
      height: 30px;
      margin-right: 10px;
    }

    .menu-item a {
      text-decoration: none;
      font-size: 14px;
      text-transform: uppercase;
      font-weight: bold;
      color: white;
      background: none;
    }
    .menu-item button{
      text-decoration: none;
      color: black;
      background-color: transparent;
      border: none;
              transition: background-color 0.3s, transform 0.3s; 
    }
    .menu-item :hover {
      font-weight: bold;
    }


    .logo {
      text-align: center;
      font-size: 18px;
      font-weight: bold;
      border-top: 2px solid white;
      padding-top: 0px;
      height: 50px;
    }

    .logo img {
      width: 200px;
      height: 100px;
    }

    .close {
      position: absolute;
      top: 10px;
      right: 20px;
      font-size: 25px;
      cursor: pointer;
      color: white;
      text-decoration: none;
      z-index: 100;
    }
    
    .close:hover {
      font-weight: bold;
    }
    
    .home-button {
    font-size: 18px;
    font-weight: bold;
    color: white;
    margin-bottom: 10px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 5px;
    }

    .home-button:hover {
     text-decoration: underline;
    }
    
  </style>
</head>
<body>
  <div class="container">
    <div class="close">&times;</div>

    <div class="left-panel">
        <div class="home-button">
            <span>Home</span>
          </div>
        <h1>PCs</h1>
        <div class="pc-container">
          <div class="pc-item">
            <img src="computer.png" alt="PC-1">
            <span>PC-1</span>
          </div>
          <div class="pc-item">
            <img src="computer.png" alt="PC-2">
            <span>PC-2</span>
          </div>
          <div class="pc-item">
            <img src="computer.png" alt="PC-3">
            <span>PC-3</span>
          </div>
          <div class="pc-item">
            <img src="computer.png" alt="PC-3">
            <span>PC-4</span>
          </div>
          <div class="pc-item">
            <img src="computer.png" alt="PC-3">
            <span>PC-5</span>
          </div>
          <div class="pc-item">
            <img src="computer.png" alt="PC-3">
            <span>PC-6</span>
          </div>
          <div class="pc-item">
            <img src="computer.png" alt="PC-3">
            <span>PC-7</span>
          </div>
          <div class="pc-item">
            <img src="computer.png" alt="PC-3">
            <span>PC-8</span>
          </div>
        </div>
      </div>
      
    <div class="right-panel">
      <div class="header">
        <span>Employee Name</span>
        <span>Time</span>
        <span>Date</span>
      </div>

      <div class="menu">
        <div class="menu-item">
          <img src="register.png" alt="Register">
          <button><span><a href = "Register_Customer.php">Register an Account</a></span></button>
        </div>
        <div class="menu-item">
          <img src="credit-card.png" alt="Load">
          <button><span><a href = "Load_account.php">Load An Account</a></span></button>
        </div>
        <div class="menu-item">
          <img src="grocery-store.png" alt="Orders">
          <button><span><a href = "Admin_Order.php">Orders</a></span></button>
        </div>
        <div class="menu-item">
          <img src="user.png" alt="Accounts">
          <button><span><a href = "Admin_Accounts.php">Accounts</a></span></button>
        </div>
        <div class="menu-item">
          <img src="logout.png" alt="Logout">
          <button><a href = "logout.php">Logout</a></button>
        </div>
      </div>

      <div class="logo">
        <img src="Logo.png" alt="Logo">
      </div>
    </div>
  </div>
  <script>
    const closeButton = document.querySelector('.close');
    const container = document.querySelector('.container');
  
    closeButton.addEventListener('click', () => {
      container.classList.add('hidden'); 
      setTimeout(() => {
        container.style.display = 'none'; 
      }, 300);
    });
  </script>  
</body>
</html>
