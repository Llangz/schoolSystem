<?php
session_start();
$servername='localhost';
$username = 'root';
$password='';
$dbname='school';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){

    echo "connection failed" . $conn->connect_error;
} 

//variables for storing users/students input

$usernames = $email = $password = $encrypted_pass = '';
$username_err = $email_err = $password_err ='';

//session variables
$_SESSION['UserRegistered'] = "Registration Successful";
$_SESSION['NotRegistered'] = "Registration not Successful";
$_SESSION['classTypeSuccess'] = "Successful";
$_SESSION['classTypeError'] = "danger";
$_SESSION['userTaken'] = "Wrong Credentials, try again or create an account";



//capture/validate user input

if (isset($_POST['save'])){

    if (empty($_POST['username'])){

        $username_err = "username is required";
    }else{
        $usernames = $_POST['username'];
    }

    if (empty($_POST['email'])){

        $email_err = "email is required";
    }else{
        $email = $_POST['email'];
    }

        if (empty($_POST['password'])){

            $password_err_ = "password is required";
        }else{
            $password = $_POST['password'];
            //encrypting password
            $encrypted_pass = md5($password);
        }
    }

        //fetching records to compare sign up details

        $sql = "SELECT * FROM users WHERE username='$username' && email='$email'";
        //execute the query
         $result= mysqli_query($conn,$sql);
         //finding number of rows that match mysql
        $num = mysqli_num_rows($result);
        //check if the implementation above works
        echo "number of row(s) that match reg details" . $num;
        //logic to use number rows
        if ($num >=1){
            $_SESSION['userTaken'];
            header("../index.php?wrongCred");
        }else{

        if (empty($username_err) && empty($email_err) && empty($password_err)){

            //prepare the statement
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?,?,?)");
            $stmt->bind_param("sss",$usernames, $email, $encrypted_pass);
        }

            if ($stmt->execute() === TRUE){
                $_SESSION['userRegistered'];
                $_SESSION['classTypeSuccess'];
                header('location: ../index.php?registered=true');


            }else{
                $_SESSION['notRegistered'];
                $_SESSION['classTypeError'];
                header('location: ../index.php?registered=false'); 
            }


        }


?>