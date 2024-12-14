<a?php 
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
      text-align: center;
      display: flex;
      justify-content: center; 
      align-items: center; 
      height: 60%; 
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
      bottom: 250px;
      display: flex;
      gap: 10px;
      align-items: center;
      text-align: center;
      justify-content: center; 
    }

    .buttons button {
        background-color: white;
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
        background-color: white;
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
          </tbody>
        </table>
      </div>
    </div>

    <div class="details-section">
      <a href="Admin_Accounts.php"><div class="close">&times;</div></a>
      <div class="header">DELETE ACCOUNT?</div>
        <div class="buttons">
            <a href="Admin_Accounts.php"><button>CANCEL</button></a>
            <button>DELETE</button>
          </div>
      </div>      
  </div>
</body>
</html>
