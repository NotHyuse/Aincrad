<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Management UI</title>
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
      background: url(background.png);
      background-size: cover;
      opacity: 0.9;
      border-radius: 20px;
      display: flex;
      background-color: white;
      box-shadow: 0 0 100px rgb(255, 255, 255);
      position: relative;
    }

    .orders-section {
      width: 90%;
      padding: 20px;
    }

    .orders-section .header {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
      color: white;
    }

    .orders-list {
      width: 100%;
      height: calc(100% - 40px);
      border: 2px solid white;
      border-radius: 20px;
      padding: 10px;
      overflow-y: auto;
    }

    .orders-list table {
      width: 100%;
      border-collapse: collapse;
    }

    .orders-list table th, 
    .orders-list table td {
      padding: 5px;
      text-align: center;
    }

    .orders-list table th {
      font-weight: bold;
      font-size: 14px;
      color: white;
    }

    .details-section {
      width: 40%;
      padding: 20px;
      position: relative;
    }

    .details-section .header {
      margin-top: 20px;
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 20px;
      color: white;
    }

    .details {
      display: flex;
      flex-direction: column;
      gap: 7px;
      margin-top: 40px;
      color: white;
      width: 100%;
    }

    .details label {
      font-size: 14px;
      font-weight: bold;
    }

    .details input {
      padding: 7px;
      font-size: 14px;
      border: none;
      border-radius: 20px;
    }

    .details .birthdate {
      display: flex;
      gap: 10px;
    }

    .details .birthdate input {
      width: calc(33.33% - 7px);
    }

    .details button {
      background-color: white;
      color: black;
      border: none;
      padding: 8px;
      text-align: center;
      font-size: 10px;
      margin-top: 5px;
      cursor: pointer;
      border-radius: 20px;
      transition: background-color 0.3s, transform 0.3s;
      width: 48%;
    }

    .details button:hover {
      background-color: #ddd;
      transform: scale(1.05);
    }

    .details .button-row {
      display: flex;
      justify-content: space-between;
      gap: 4%;
    }


    .close {
      position: absolute;
      top: 10px;
      right: 20px;
      font-size: 25px;
      cursor: pointer;
      color: white;
      text-decoration: none;
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="orders-section">
      <div class="header">ACCOUNTS</div>
      <div class="orders-list">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>NAME</th>
              <th>IGN</th>
              <th>BIRTHDAY</th>
              <th>EMAIL</th>
              <th>PHONE #</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>

    <div class="details-section">
      <div class="close">&times;</div>
      <div class="details">
        <label for="first-name">FIRST NAME*</label>
        <input type="text" id="first-name" placeholder="Enter first name" required>

        <label for="ign">IGN (USERNAME)*</label>
        <input type="text" id="ign" placeholder="Enter username" required>

        <label for="email">EMAIL ADDRESS*</label>
        <input type="email" id="email" placeholder="Enter email" required>

        <label for="last-name">LAST NAME*</label>
        <input type="text" id="last-name" placeholder="Enter last name" required>

        <label>BIRTHDAY*</label>

          <input type="date" placeholder="Month" min="1" max="12" required>

        <label for="phone">PHONE NUMBER*</label>
        <input type="tel" id="phone" placeholder="Enter phone number" required>

        <div class="button-row">
            <a href="Admin_accounts.php"><button type="submit">BACK</button></a>
            <button type="submit">CONFIRM</button>
          </div>
    </div>      
  </div>
</body>
</html>