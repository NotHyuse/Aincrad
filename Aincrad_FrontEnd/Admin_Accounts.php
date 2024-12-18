<?php 
session_start();
include("connect.php");

// Fetch customer data from the database
$query = "SELECT * FROM Customer";  // Adjust the table name and columns if needed
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Query Failed: ' . mysqli_error($conn));
}
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
      width: 900px;
      height: 500px;
      background: url(background.png);
      background-size: cover;
      opacity: 0.9;
      border-radius: 20px;
      display: flex;
      background-color: whitesmoke;
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
      background-color: whitesmoke;
      overflow: auto;
    }

    .orders-list table {
      width: 100%;
      border-collapse: collapse;
    }

    .orders-list table th, 
    .orders-list table td {
      padding: 5px;
      text-align: center;
      font-size: 14px;
    }

    .orders-list table th {
      font-weight: bold;
      font-size: 14px;
      color: black;
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
      flex-direction: row;
      align-items: center;
      gap: 10px;
      margin-top: 25px;
    }


    .details span {
      font-size: 14px;
      font-weight: bold;
      color: white;
    }
    .details img {
      width: 50px;
      height: 50px;
      border: none;
    }
    
    .details:hover {
      background-color: transparent;
    }

    .click {
        background-color: transparent;
        cursor: pointer;
    }

    .details button {
        background-color: transparent;
        border: none;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }

    .buttons {
      position: absolute;
      bottom: 20px;
      display: flex;
      gap: 70px;
    }

    .buttons button {
        background-color: whitesmoke;
        color: black;
        border: none;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 12px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 20px;
        transition: background-color 0.3s, transform 0.3s; 
        width: 100px;
    }

    .buttons button:hover {
        background-color: whitesmoke;
        transform: scale(1.05);
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
            <?php
            // Loop through the result set and display data in the table
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['Customer_ID_PK']) . "</td>";  // Assuming column names are 'id', 'name', etc.
                echo "<td>" . htmlspecialchars($row['Customer_FirstName'] . " " . $row['Customer_LastName']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Customer_Username']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Customer_Birthday']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Customer_Email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Customer_PhoneNumber']) . "</td>";
                echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="details-section">
      <a href="PC_Management.php"><div class="close">&times;</div></a>
        <div class="details" style="margin-top: 80px;">
          <img src="delete.png" alt="DEL">
          <a href="delete_ui.php" class="click"><button>DELETE ACCOUNT</button></a>
        </div>
        <div class="details">
          <img src="edit.png" alt="EDIT">
          <a href="edit_account_UI.php" class="click"><button>EDIT AN ACCOUNT</button></a>
        </div>
    </div>      
  </div>
</body>
</html>

