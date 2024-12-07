<?php
include 'connect.php';

if(isset($_POST['signUp'])){
    $fullname=$_POST['fullName'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password=md5($password);
    
     $CheckUser="SELECT * FROM customer where Customer_Username='$username'";
     $result=$conn->query($CheckUser);
     if($result->num_rows > 0){
        echo "Username is taken!";
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

if(isset($_POST["Login"])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password=md5($password);

    $sql = "SELECT * FROM customer where Customer_Username = '$username' and Customer_Password = '$password'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['Customer_Username'] = $row['Customer_Username'];
        header('Location: user_menu.php');
        exit();
    }
    else{
        echo "Incorrect Username or Password";
    }
}
?>