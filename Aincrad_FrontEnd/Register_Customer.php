<?php 
session_start();
include("connect.php");
?>

<?php

if(isset($_POST['signUp'])){
    $firstName=$_POST['FirstName'];
    $lastName=$_POST['LastName'];
    $username=$_POST['username'];
    $birthday=$_POST['birthday'];
    $email=$_POST['Email'];
    $PhoneNumber=$_POST['Phone_Number'];
    $password=$_POST['password'];
    $password=md5($password);
    $account_type = 2;
    $startingBalance = 120;
    
     $CheckUser="SELECT * FROM customer where Customer_Username='$username'";
     $result=$conn->query($CheckUser);
     if($result->num_rows > 0){
        echo "
        <script>
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
                <p>Username already exists</p>
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
                window.location.href = 'Register.php'; // Redirect to the signup page
            }
        </script>";
     }
     else{
        $insertQuery = "INSERT INTO customer(Customer_FirstName, Customer_LastName, Customer_Username, Customer_Birthday, Customer_Email, Customer_PhoneNumber, Customer_Password, Account_Type_ID_FK, Customer_Balance)
                        VALUES('$firstName', '$lastName', '$username', 
                        '$birthday', '$email', '$PhoneNumber', 
                        '$password', '$account_type', '$startingBalance')";
            if($conn->query($insertQuery)==TRUE){
                header("location: PC_Management.php");
            }
            else{
                echo "Error".$conn->error;
            }
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css">  </head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

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
    .form-container {
      width: 700px;
      background: url(background.png);
      opacity: 0.9;
      background-size: cover;
      padding: 20px;
      border-radius: 20px;
      background-color: #fff;
      box-shadow: 0 0 100px rgb(255, 255, 255);
      position: relative;
    }
    .form-container h1 {
      font-size: 30px;
      margin-bottom: 50px;
      text-align: left;
      font-weight: bold;
      color: white;
    }
    .form-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
    }
    .form-group {
      flex: 1;
      margin-right: 10px;
    }
    .form-group:last-child {
      margin-right: 0;
    }
    .form-group label {
      font-size: 15px;
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
      color: white;
    }
    .form-group input {
      width: 80%;
      padding: 8px;
      font-size: 12px;
      border: 1px solid black;
      border-radius: 20px;
    }
    .birthday-fields {
      display: flex;
      gap: 5px;
    }
    .birthday-fields input {
      width: calc(80%);
    }
    .buttons {
      width: 50%;
      align-items: right;
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
      margin-left: 300px;
    }
    .buttons button {
      flex: 1;
      padding: 10px;
      font-size: 12px;
      font-weight: bold;
      border: 1px solid black;
      border-radius: 20px;
      cursor: pointer;
      margin-right: 10px;
      text-decoration: none;
      transition: background-color 0.3s, transform 0.3s; 
    }

    .buttons a {
      color: black;
      text-decoration: none;
    }

    .buttons button:hover {
      background-color: white;
      transform: scale(1.05);
      text-decoration: none;
      color: black;
    }


    p.login-link {
      text-align: right;
      margin-right: 100px;
      margin-top: 10px;
      font-size: 12px;
      color: white;
    }
    .login-link a {
      color: white;
      text-decoration: underline;
    }
    .close-button a{
      position: absolute;
      top: 20px;
      right: 30px;
      font-size: 18px;
      cursor: pointer;
      color: white;
      text-decoration: none;
    }
    .close-btn:hover {
      font-weight: bold;
    }

    .form-row.single-field .form-group input {
    width: 39%; 
    }

  </style>
</head>
<body>
  <div class="form-container">
    <div class="close-button"><a href="PC_Management.php">✖</a></div>
    <h1>REGISTER AN ACCOUNT</h1>
    <form method = "post" action = "Register_Customer.php">
      <div class="form-row">
        <div class="form-group">
          <label for="first-name">FIRST NAME</label>
          <input type="text" id="first-name" name="FirstName" required>
        </div>
        <div class="form-group">
          <label for="last-name">LAST NAME</label>
          <input type="text" id="last-name" name="LastName" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="password">PASSWORD</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="birthday">BIRTHDAY</label>
            <div class="birthday-fields">
                <input type="date" id="birthday" name="birthday" required>
                </div>
              </div>
        </div>
      <div class="form-row">
        <div class="form-group">
          <label for="ign">IGN (USERNAME)</label>
          <input type="text" id="ign" name="username" required>
        </div>
        <div class="form-group">
          <label for="phone">PHONE NUMBER</label>
          <input type="tel" id="phone" name="Phone_Number" required>
        </div>
      </div>
      <div class="form-row single-field">
        <div class="form-group">
          <label for="email">EMAIL ADDRESS</label>
          <input type="email" id="email" name="Email" required>
        </div>
      </div>      
      <p class="login-link">Register an account for an <a href="Register_admin.php">Admin</a></p>
      <div class="buttons">
        <button type="button"><a href = "PC_management.php">CANCEL</a></button>
        <button type="submit" name = "signUp" id = "signUp">REGISTER</button>
      </div>
    </form>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js"></script>
    <script>
        $('#birthday').datepicker({
            format: 'yyyy-mm-dd', // Format for MySQL DATE field
            autoclose: true
        });
    </script>
</body>
</html>

