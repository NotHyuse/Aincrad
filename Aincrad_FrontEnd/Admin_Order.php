<?php
session_start();
include("connect.php");

// Fetch order data from the Transaction table
$sql = "SELECT * FROM Transaction"; // You might need to add WHERE clause for specific orders
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error fetching data: " . mysqli_error($conn));
}

$orders = [];
while ($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row;
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
      width: 60%;
      border-right: 3px solid white;
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
      margin-bottom: 20px;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .details span {
      font-size: 14px;
      font-weight: bold;
      color: white;
    }

    .buttons {
      position: absolute;
      bottom: 20px;
      display: flex;
      gap: 70px;
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
    <script>
        function showOrderDetails(orderId) {
            // Make an AJAX request to get order details
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var orderDetails = JSON.parse(this.responseText);
                    document.getElementById("orderId").innerText = orderDetails.Transaction_ID_PK;
                    document.getElementById("customerName").innerText = orderDetails.Customer_ID_FK; // Assuming you have customer name available
                    document.getElementById("orders").innerText = orderDetails.Order_ID_FK; // Assuming you have order details available
                    document.getElementById("total").innerText = orderDetails.Transaction_Total;
                    document.getElementById("date").innerText = orderDetails.Transaction_Date;
                    document.getElementById("paymentType").innerText = orderDetails.Transaction_Type;

                }
            };
            xhttp.open("GET", "get_order_details.php?id=" + orderId, true);
            xhttp.send();
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="orders-section">
            <div class="header">ORDERS</div>
            <div class="orders-list">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CUSTOMER'S NAME</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr onclick="showOrderDetails(<?php echo $order['Transaction_ID_PK']; ?>)">
                                <td><?php echo $order['Transaction_ID_PK']; ?></td>
                                <td><?php echo $order['Customer_ID_FK']; ?></td>  
                                <td><?php echo $order['Transaction_Total']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="details-section">
            <a href="PC_Management.php" class="close">×</a>
            <div class="header">ORDER DETAILS</div>
            <div class="details">
                <span>ID: <span id="orderId"></span></span>
                <span>CUSTOMER: <span id="customerName"></span></span>
                <span>ORDERS: <span id="orders"></span></span>
                <span>TOTAL: <span id="total"></span></span>
                <span>DATE: <span id="date"></span></span>
                <span>PAYMENT TYPE: <span id="paymentType"></span></span>
            </div>
            <div class="buttons">
                <button>BACK</button>
                <button>COMPLETE</button>
            </div>
        </div>
    </div>
</body>
</html>