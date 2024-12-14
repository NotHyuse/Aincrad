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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    
<style>
    
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
    background: url(retro.jpg);
    background-size: cover;
    background-position: center;
}

.wrapper {
    height: 800px;
    width: 1100px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .2);
    backdrop-filter: blur(20px);
    box-shadow: 0 0 20px rgba(0, 0, 0, .1);
    color: #fff;
    border-radius: 80px;
    padding: 30px 40px;
}

.wrapper h1,h2 {
    margin: 0;
    line-height: .7;
}

.wrapper h1 {
    font-size: 122px;
    text-align: left;
    color: whitesmoke;
    margin-bottom: 5px;
    margin-top: 60px;
    margin-left: 20px;
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
    margin-bottom: 30px;
    margin-left: 20px;
    margin-top: 50px;
    margin-bottom: 10px;
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
    height: 70px;
    background: blueviolet;
    margin-top: 70px;
    margin-bottom: 5px;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    cursor: pointer;
    font-size: 16px;
    color: #fff;
    font-weight: 600;
    margin-left: 90px;
}

.Robot {
    width: 500px;
    height: 400px;
    margin-left: 400px;
    align-items: right;
    gap: 100px; 
}
.profile-image {
    width: 500px;
    height: 300px;
    display: block;
    margin-left: 500px;
    margin-right: auto;
    margin-top: -350px;
}

</style>
</head>

<body>

    <div class="wrapper" id="signIn">
        <form method = "post" action="Index.php">
            <h1>Welcome</h1>
            <h2>BACK!</h2>
            <div class="input-box">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter username" required>
            </div>
            <div class="input-box">
                <label for="username">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter password" required>
            </div> 
        </img src="Welcome!.png" alt="Image" class="Robot">
            <button type="submit" class="btn" value="Login" name="Login">Login</button>
            <img src="Logo.png" alt="Sample Image" class="profile-image">
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST["Login"])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $user_role = null;

    // Unified query to get account type
    $sql = "SELECT Account_Type_ID_FK FROM (
                SELECT Customer_Username AS Username, Customer_Password AS Password, Account_Type_ID_FK FROM customer
                UNION ALL
                SELECT Employee_Username AS Username, Employee_Password AS Password, Account_Type_ID_FK FROM employee
            ) AS combined
            WHERE Username = '$username' AND Password = '$password'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_role = $row['Account_Type_ID_FK'];
    }

    // Handle redirection based on role
    switch ($user_role) {
        case '2': // Assuming '1' corresponds to customer
            session_start();
            $_SESSION['Customer_Username'] = $username;
            $_SESSION['Login_Time'] = time();
            header('Location: User_Menu.php'); // Redirect to customer dashboard
            exit();

        case '1': // Assuming '2' corresponds to employee
            session_start();
            $_SESSION['Employee_Username'] = $username;
            $_SESSION['Login_Time'] = time();
            header('Location: PC_Management.php'); // Redirect to employee dashboard
            exit();

        default:
            // If no match found, display error modal
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
                    <p>Invalid Login Attempt: Incorrect Username or Password</p>
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
                    window.location.href = 'Index.php';
                }
            </script>
            ";
            break;
    }
}
?>