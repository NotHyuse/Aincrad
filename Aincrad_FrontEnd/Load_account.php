<?php
session_start();
include("connect.php");

if (isset($_POST['DETAILS'])) {
    $username = $_POST['username'];
    $username = mysqli_real_escape_string($conn, $username); // Sanitize input

    $sql = "SELECT * FROM customer WHERE Customer_Username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['Customer_FirstName'] ." ". $row['Customer_LastName'];
        $userid = $row['Customer_ID_PK'];
        $birthday = $row['Customer_Birthday'];
        $email = $row['Customer_Email'];
        $pnum = $row['Customer_PhoneNumber'];

        // Store data in session variables for later use
        $_SESSION['loaded_user'] = $row;

    } else {
      // Use a custom modal instead of a simple alert
      echo <<<HTML
      <div id="myModal" class="modal">
          <div class="modal-content">
              <p>User not found.</p>
              <button id="closeModal">OK</button>
          </div>
      </div>

      <script>
      var modal = document.getElementById("myModal");
      var btn = document.getElementById("closeModal");

      modal.style.display = "block"; // Show the modal

      btn.onclick = function() {
          modal.style.display = "none"; // Hide the modal
      };

      window.onclick = function(event) { // Close if clicked outside
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
      </script>
      <style>
          /* Basic modal styles */
          .modal {
              display: none; /* Hidden by default */
              position: fixed; /* Stay in place */
              z-index: 1; /* Sit on top */
              left: 0;
              top: 0;
              width: 100%; /* Full width */
              height: 100%; /* Full height */
              overflow: auto; /* Enable scroll if needed */
              background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
          }

          .modal-content {
              background-color: #fefefe;
              margin: 15% auto; /* 15% from the top and centered */
              padding: 20px;
              border: 1px solid #888;
              width: 300px; /* Adjust width as needed */
              text-align: center; /* Center the content */
          }
      </style>

HTML;

  }
}



if (isset($_POST['ADD'])) {
  $amountToAdd = floatval($_POST['amount']);

  if (isset($_SESSION['loaded_user'])) {
      $username = $_SESSION['loaded_user']['Customer_Username']; 

      // Update ONLY the customer table
      $sql = "UPDATE customer SET Customer_Balance = Customer_Balance + ? WHERE Customer_Username = ?";
      $stmt = mysqli_prepare($conn, $sql);

      if ($stmt) {
          mysqli_stmt_bind_param($stmt, "ds", $amountToAdd, $username);
          $result = mysqli_stmt_execute($stmt);

          if ($result) {
              echo <<<HTML
    <div id="myModal" class="modal">
        <div class="modal-content">
            <p>Amount Loaded successfully!</p>
            <button id="closeModal">OK</button>
        </div>
    </div>

    <script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("closeModal");

    modal.style.display = "block"; // Show the modal

    btn.onclick = function() {
        modal.style.display = "none"; // Hide the modal
    };

    window.onclick = function(event) { // Close if clicked outside
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
    <style>
        /* Basic modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 300px; /* Adjust width as needed */
            text-align: center; /* Center the content */
        }
    </style>

HTML;
              // Refresh session data after update
              $sql = "SELECT * FROM customer WHERE Customer_Username = '$username'";
              $result = mysqli_query($conn, $sql);
              if ($result && mysqli_num_rows($result) > 0) {
                  $_SESSION['loaded_user'] = mysqli_fetch_assoc($result);
                  unset($_SESSION['loaded_user']);
              }

          } else {
              echo "Error adding amount: " . mysqli_error($conn);
          }
          mysqli_stmt_close($stmt);
      } else {
          echo "Error preparing statement: " . mysqli_error($conn);
      }

  } else {
    // Use a custom modal instead of a simple alert
    echo <<<HTML
    <div id="myModal" class="modal">
        <div class="modal-content">
            <p>No User Loaded. Load User First.</p>
            <button id="closeModal">OK</button>
        </div>
    </div>

    <script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("closeModal");

    modal.style.display = "block"; // Show the modal

    btn.onclick = function() {
        modal.style.display = "none"; // Hide the modal
    };

    window.onclick = function(event) { // Close if clicked outside
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
    <style>
        /* Basic modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 300px; /* Adjust width as needed */
            text-align: center; /* Center the content */
        }
    </style>

HTML;

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Load an Account UI</title>
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
      opacity: 0.9;
      background-size: cover;
      padding: 20px;
      border-radius: 20px;
      background-color: #fff;
      box-shadow: 0 0 100px rgb(255, 255, 255);
      position: relative;
    }

    .header {
      font-size: 25px;
      font-weight: bold;
      margin-bottom: 20px;
      color: white;
    }

    .form {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 20px;
    }

    .form-group {
      margin-top: 20px;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .form-group label {
      font-size: 15px;
      font-weight: bold;
      color: white;
    }

    .form-group input {
      width: 180px;
      height: 30px;
      border: 1px solid #000;
      border-radius: 20px;
      padding: 5px;
    }

    .form-group button {
      width: 80px;
      height: 30px;
      background-color: #e0e0e0;
      border: 1px solid #000;
      border-radius: 20px;
      font-size: 12px;
      cursor: pointer;
      margin-top: 5px;
      margin-left: auto;
    }

    .form-group button:hover {
      background-color: #d0d0d0;
    }

    .logo {
      width: 250px;
      height: 150px;
      display: flex;
      justify-content: center;
      align-items: center;
      background-image: url(Logo.png);
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
    }

    .details {
      margin: 0px;
      border: 1px solid #000;
      padding: 10px;
      border-radius: 10px;
      display: grid;
      grid-template-columns: 1fr 1fr; 
      gap: 40px;
      overflow: auto; 
      background-color: white;
    }

    .details span {
      font-size: 15px;
      font-weight: bolder;
      margin: 10px;
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
  </style>
</head>
<body>
  <div class="container">
    <div class="close"><a href = "PC_Management.php">&times;</a></div>

    <div class="header">LOAD AN ACCOUNT</div>

    <div class="form">
      <div class="form-group">
        <form id="detailsForm" method="POST">  </form>
          <label for="username">ENTER USERNAME:</label>
          <input type="text" name="username" form="detailsForm" >
          <button type="submit" name="DETAILS" form="detailsForm">DETAILS</button>
      </div>
      <div class="form-group">
        <form method = "POST" action="Load_account.php">
        <label for="amount">AMOUNT:</label>
        <input type="number" name="amount" style="width: 120px;">
        <button type="submit" name="ADD">ADD</button>
        </form>
      </div>
      <div class="logo"></div>
    </div>

    <div class="details">
      <label for="name">NAME: <span id="name"></span></label>
      <label for="username">Username: <span id="username"></span></label>
      <label for="userid">USERID: <span id="userid"></span></label>
      <label for="birthday">BIRTHDAY: <span id="birthday"></span></label>
      <label for="email">EMAIL ADDRESS: <span id="email"></span></label>
      <label for="pnum">PHONE NUMBER: <span id="pnum"></span></label>
      <span></span>
    </div>
  </div>
  <script>
        // JavaScript to populate the details section
        <?php if(isset($_SESSION['loaded_user'])): ?>
        window.onload = function() {
            document.getElementById("name").textContent = "<?php echo $name; ?>";
            document.getElementById("username").textContent = "<?php echo $username; ?>";
            document.getElementById("userid").textContent = "<?php echo $userid; ?>";
            document.getElementById("birthday").textContent = "<?php echo $birthday; ?>";
            document.getElementById("email").textContent = "<?php echo $email; ?>";
            document.getElementById("pnum").textContent = "<?php echo $pnum; ?>";
        };
        <?php endif; ?>

    </script><script>
        // JavaScript to populate the details section
        <?php if(isset($_SESSION['loaded_user'])): ?>
        window.onload = function() {
            document.getElementById("name").textContent = "<?php echo $name; ?>";
            document.getElementById("username").textContent = "<?php echo $username; ?>";
            document.getElementById("userid").textContent = "<?php echo $userid; ?>";
            document.getElementById("birthday").textContent = "<?php echo $birthday; ?>";
            document.getElementById("email").textContent = "<?php echo $email; ?>";
            document.getElementById("pnum").textContent = "<?php echo $pnum; ?>";
        };
        <?php endif; ?>

    </script>
</body>
</html>

