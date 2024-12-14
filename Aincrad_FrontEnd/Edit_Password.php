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
  <title>Edit Password UI</title>
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
      margin-left: 30px;
      margin-top: 20px;
      margin-bottom: 20px;
      color: white;
      font-family: 'League Spartan';
    }

    .form-container {
      display: flex;
      flex-direction: column;
      gap: 20px;
      margin-top: 20px;
      margin-left: 30px;
      width: 50%;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .form-group label {
      font-weight: bold;
      font-size: 16px;
      color: white;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 20px;
      font-size: 14px;
    }

    .form-group input[type="password"] {
      background-color: #f9f9f9;
    }

    .form-actions {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .form-actions button {
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .form-actions .cancel-button {
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
        margin-left: 250px;
        width: 150px;
        margin-top: 40px;
        margin-bottom: 40px;
    }

    .form-actions .cancel-button:hover {
      background-color: white;
      transform: scale(1.05); 
      }

    .form-actions .confirm-button {
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

    .form-actions .confirm-button:hover {
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

    <div class="content" id = "change_password">
      <form method = "post" action = "Edit_Password.php">
      <h1>Edit Password</h1>
      <div class="form-container">
        <div class="form-group">
          <label for="old-password">OLD PASSWORD</label>
          <input type="password" id="old_password" name="old_password" placeholder="Enter old password" required>
        </div>

        <div class="form-group">
          <label for="new-password">NEW PASSWORD</label>
          <input type="password" id="new_password" name="new_password" placeholder="Enter new password" required>
        </div>

        <div class="form-group">
          <label for="confirm-password">CONFIRM PASSWORD</label>
          <input type="password" id="new_confirm_password" name="new_confirm_password" placeholder="Confirm new password" required>
        </div>
      </div>

      <div class="form-actions">
        <button class="cancel-button"><a href="User_menu.php" style="text-decoration: none; color: black;">Cancel</a></button>
        <button class="confirm-button" type = "submit" name="change_password">CONFIRM</button>
      </div>

      <div class="close-button"><a href="User_menu.php">✖</a></div>
      </form>
    </div>
  </div>
</body>
</html>

<?php

if (isset($_POST["change_password"])) {
    $old_password = md5($_POST['old_password']); // Assuming passwords are stored as MD5 hashes
    $new_password = $_POST['new_password'];
    $new_password_confirm = $_POST['new_confirm_password'];

    // Get the username from the session
    $username = $_SESSION['Customer_Username'];

    // Check if the old password is correct
    $sql = "SELECT * FROM customer WHERE Customer_Username = '$username' AND Customer_Password = '$old_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Check if the new password and confirmation match
        if ($new_password === $new_password_confirm) {
            $hashed_new_password = md5($new_password); // Hash the new password
            $sql = "UPDATE customer SET Customer_Password = '$hashed_new_password' WHERE Customer_Username = '$username'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>
                    document.body.innerHTML += `
                    <div id='PassChangeSuccess' style='
                        position: fixed;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        padding: 20px;
                        background-color: white;
                        border: 1px solid #ccc;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                        text-align: center;
                        z-index: 1000;'>
                        <p>Password successfully updated!</p>
                        <button onclick='closeModal()' style='
                            background-color: #007BFF;
                            color: white;
                            border: none;
                            padding: 10px 20px;
                            cursor: pointer;
                            border-radius: 5px;'>OK</button>
                    </div>
                    <div style='
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background: rgba(0, 0, 0, 0.5);
                        z-index: 999;' onclick='closeModal()'></div>
                    `;
                    function closeModal() {
                        document.getElementById('PassChangeSuccess').remove();
                        window.location.href = 'Edit_Password.php';
                    }
                </script>
                ";
            } else {
                echo "<script>
                        document.body.innerHTML += `
                        <div id='errorModal' style='
                            position: fixed;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            padding: 20px;
                            background-color: white;
                            border: 1px solid #ccc;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                            text-align: center;
                            z-index: 1000;'>
                            <p>Error updating password: " . $conn->error . "</p>
                            <button onclick='closeModal()' style='
                                background-color: #007BFF;
                                color: white;
                                border: none;
                                padding: 10px 20px;
                                cursor: pointer;
                                border-radius: 5px;'>OK</button>
                        </div>
                        <div style='
                            position: fixed;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background: rgba(0, 0, 0, 0.5);
                            z-index: 999;' onclick='closeModal()'></div>
                        `;
                        function closeModal() {
                            document.getElementById('errorModal').remove();
                        }
                      </script>";
            }
        } else {
            echo "<script>
                  document.body.innerHTML += `
                  <div id='errorNewPassNoMatch' style='
                      position: fixed;
                      top: 50%;
                      left: 50%;
                      transform: translate(-50%, -50%);
                      padding: 20px;
                      background-color: white;
                      border: 1px solid #ccc;
                      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                      text-align: center;
                      z-index: 1000;'>
                      <p>New password and confirmation do not match.</p>
                      <button onclick='closeModal()' style='
                          background-color: #007BFF;
                          color: white;
                          border: none;
                          padding: 10px 20px;
                          cursor: pointer;
                          border-radius: 5px;'>OK</button>
                  </div>
                  <div style='
                      position: fixed;
                      top: 0;
                      left: 0;
                      width: 100%;
                      height: 100%;
                      background: rgba(0, 0, 0, 0.5);
                      z-index: 999;' onclick='closeModal()'></div>
                  `;
                  function closeModal() {
                      document.getElementById('errorNewPassNoMatch').remove();
                      window.location.href = 'Edit_Password.php';
                  }
                </script>
                ";
        }
    } else {
        echo "<script>
                  document.body.innerHTML += `
                  <div id='errorOldPassIncorrect' style='
                      position: fixed;
                      top: 50%;
                      left: 50%;
                      transform: translate(-50%, -50%);
                      padding: 20px;
                      background-color: white;
                      border: 1px solid #ccc;
                      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                      text-align: center;
                      z-index: 1000;'>
                      <p>Old password is incorrect.</p>
                      <button onclick='closeModal()' style='
                          background-color: #007BFF;
                          color: white;
                          border: none;
                          padding: 10px 20px;
                          cursor: pointer;
                          border-radius: 5px;'>OK</button>
                  </div>
                  <div style='
                      position: fixed;
                      top: 0;
                      left: 0;
                      width: 100%;
                      height: 100%;
                      background: rgba(0, 0, 0, 0.5);
                      z-index: 999;' onclick='closeModal()'></div>
                  `;
                  function closeModal() {
                      document.getElementById('errorOldPassIncorrect').remove();
                      window.location.href = 'Edit_Password.php';
                  }
                </script>
                ";;
    }
}

?>
