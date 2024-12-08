<?php 
include("connect.php");
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
</head>

<body>

    <div class="wrapper" id ="signUp">
        <form method = "post" action="index.php">
            <h1>Welcome!</h1>
            <div class="input-box">
                <label for="username">Name</label>
                <input type="text" name="fullName" id="fullName" placeholder="Enter your full name" required>
            </div>
            <div class="input-box">
                <label for="username">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter password" required>
            </div>
            <div class="input-box">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter username" required>
            </div>
            <input type="submit" class="btn" value="Sign Up" name="signUp"></p>

            <div class="register-link">
                <p>Already have an account? <a href="Login.php">Login</a></p>
            </div>
            <img src="Logo.png" alt="Sample Image" class="profile-image">
        </form>
    </div>
</body>
</html>

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