<?php 
session_start();
include("connect.php");
?>

<?php

if(isset($_POST['signUp'])){
    $firstName=$_POST['first-name'];
    $lastName=$_POST['last-name'];
    $username=$_POST['username'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $PhoneNumber=$_POST['phone'];
    $password=$_POST['password'];
    $account_type= 1;
    $password=md5($password);
    
     $CheckUser="SELECT * FROM employee where Employee_Username='$username'";
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
        $insertQuery = "INSERT INTO Employee(Employee_FirstName, Employee_LastName, Employee_Username, Employee_Address, Employee_Email, Employee_PhoneNumber, Employee_Password, Account_Type_ID_FK)
                        VALUES('$firstName', '$lastName', '$username', '$address', '$email', '$PhoneNumber', '$password', '$account_type')";
            if($conn->query($insertQuery)==TRUE){
                header("location: User_Menu.php");
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
      justify-content: flex-start;
      align-items: flex-start;
      margin-bottom: 15px;
      gap: 100px;
    }
    .form-group {
      flex: none;
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
      width: 120%;
      padding: 8px;
      font-size: 12px;
      border: 1px solid black;
      border-radius: 20px;
    }
    .buttons {
      width: 50%;
      align-items: right;
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
      margin-left: 300px;
    }
    button {
      flex: 1;
      padding: 10px;
      font-size: 12px;
      font-weight: bold;
      border: 1px solid black;
      background-color: white;
      border-radius: 20px;
      cursor: pointer;
      margin-right: 10px;
    }
    button:last-child {
      margin-right: 0;
    }
    button:hover {
      background-color: #f0f0f0;
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
    .close-button a {
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
    width: 285%; 
    }

  </style>
</head>
<body>
  <div class="form-container">
    <div class="close-button"><a href="Admin_Dashboard.php">✖</a></div>
    <h1>REGISTER AN ACCOUNT FOR ADMIN</h1>
    <form method = "post" action = "Register_Admin.php">
      <div class="form-row">
        <div class="form-group">
          <label for="first-name">FIRST NAME</label>
          <input type="text" id="first-name" name="first-name" required>
        </div>
        <div class="form-group">
          <label for="last-name">LAST NAME</label>
          <input type="text" id="last-name" name="last-name" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="position">USERNAME</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="email">EMAIL ADDRESS</label>
          <input type="text" id="email" name="email" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="password">PASSWORD</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="phone">PHONE NUMBER</label>
          <input type="tel" id="phone" name="phone" required>
        </div>
      </div>
      <div class="form-row">
    <div class="form-row single-field">
        <div class="form-group">
          <label for="address">ADDRESS</label>
          <input type="text" id="address" name="address" required>
        </div>
        </div>
    </div>      
      <p class="login-link">Register an account for <a href="Register_Customer.php">Customer</a></p>
      <div class="buttons">
        <button type="button">CANCEL</button>
        <button type="submit" name = "signUp">REGISTER</button>
      </div>
    </form>
  </div>
</body>
</html>
