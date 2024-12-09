<?php 
include("connect.php");
?>

<?php

if(isset($_POST['signUp'])){
    $fullname=$_POST['fullName'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password=md5($password);
    
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
                window.location.href = 'index.php'; // Redirect to the signup page
            }
        </script>";
     }
     else{
        $insertQuery = "INSERT INTO customer(Customer_Fullname, Customer_Username, Customer_Password)
                        VALUES('$fullname', '$username', '$password')";
            if($conn->query($insertQuery)==TRUE){
                header("location: login.php");
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
    <meta charset ="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almoranas Gaming</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
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

.wrapper {
    height: 950px;
    width: 1000px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .2);
    backdrop-filter: blur(20px);
    box-shadow: 0 0 20px rgba(0, 0, 0, .1);
    color: #fff;
    border-radius: 80px;
    padding: 30px 40px;
    display: flex;
}

.wrapper h1,h2 {
    margin: 0;
    line-height: .7;
}

.wrapper h1 {
    font-size: 80px;
    text-align: left;
    color: whitesmoke;
    margin-bottom: 5px;
    margin-top: 60px;
    margin-left: 20px;
    margin-bottom: 50px;
}

.wrapper h2 {
    font-size: 38.5px;
    text-align: left;
    color: whitesmoke;
    margin-top: 0;
    margin-left: 40px;
}

.wrapper label {
    color: whitesmoke;
    font-size: 28.2px;
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
    margin-left: 20px;
}


.wrapper form {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; 
}

.wrapper .input-box {
    width: 45%; 
    margin: 10px 0;
    margin-left: 20px;
    margin-top: 30px;
}

.input-box input {
    width: 100%; 
    height: 60px;
    background-color: whitesmoke;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, .2);
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    font-size: 16px;
    color: black;
    padding: 20px 45px 20px 20px;
}

.input-box input::placeholder {
    color: #d9d9d9;
}

.wrapper .btn {
    width: 30%;
    height: 60px;
    background: white;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    cursor: pointer;
    font-size: 16px;
    color: black;
    font-weight: 600;
    margin-left: 600px;
}

.wrapper .register-link {
    font-size: 20px;
    text-align: right;
    padding: 10px 20px;
    color: whitesmoke;
    line-height: 0%;
}

.register-link p a {
    color: whitesmoke;
    text-decoration: none;
    font-weight: 600;
    text-decoration: underline;
}


.profile-image {
    width: 400px;
    height: 200px;
    border: none;
    margin: 0;
    display: inline-flex;
}

    </style>
</head>

<body>

    <div class="wrapper" id ="signUp">
        <form method = "post" action="Register.php">
            <h1>Register an account</h1>
            <div class="input-box">
                <label for="username">First Name</label>
                <input type="text" name="FirstName" id="FirstName" required>
            </div>
            <div class="input-box">
                <label for="username">Last Name</label>
                <input type="text" name="LastName" id="LastName" required>
            </div>
            <div class="input-box">
                <label for="username">IGN (Username)</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="input-box">
                <label for="username">Birthday</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="input-box">
                <label for="username">Email Address</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="input-box">
                <label for="username">Phone number</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="register-link">
                <p>Already have an account? <a href="Index.php">Login</a></p>
            </div>
            <div>
            <img src="Logo.png" alt="Sample Image" class="profile-image">
            <input type="submit" class="btn" value="Register" name="signUp"></p>
            </div>
        </form>
    </div>
</body>
</html>
