<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}


    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

        $sql = "SELECT * FROM `users` WHERE `email`='$email' && `mobile`='$mobile';";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       if($resultCheck > 0){

           while ($row = mysqli_fetch_assoc($result)) {

			session_start();
            $_SESSION['tmp1']=$row['password'];
			header('Location: reset.php');
          
           }
       }
       else{
        session_start();
        $_SESSION['tmp1']="Invalid username or mobile!";
        header('Location: reset.php');
    }
?>