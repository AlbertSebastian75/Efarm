<?php
	session_start();

	$conn=mysqli_connect("localhost", "root", "", "alb");

	if(!$conn){
		die("Error: Failed to connect to database!");
	}

		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$email' && `password`='$password'") or die(mysqli_error());
		$fetch=mysqli_fetch_array($query);
		$count=mysqli_num_rows($query);

		if($count > 0){
			$_SESSION['users_id']=$fetch['users_id'];
     		header('Location:../user/user_home.php');
			$_SESSION['user']=$fetch['firstname'];
			//$_SESSION['users_id']=$row['users_id'];
		}

		else{
			$_SESSION['tmp']="Invalid username or password!";
			header('Location: login.php');
		  }
?>