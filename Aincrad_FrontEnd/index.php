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
        <form method = "post" action="register.php">
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
            <input type="submit" class="btn" value="Sign Up" name="signUp"></>

            <div class="register-link">
                <p>Already have an account? <a href="Login.php">Login</a></p>
            </div>
            <img src="Logo.png" alt="Sample Image" class="profile-image">
        </form>
    </div>
</body>
</html>