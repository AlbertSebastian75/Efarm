<?php

$txt1=filter_input(INPUT_POST, 'firstname');
$txt2=filter_input(INPUT_POST, 'lastname');
$txt3=filter_input(INPUT_POST, 'email');
$txt4=filter_input(INPUT_POST, 'mobile');
$txt5=filter_input(INPUT_POST, 'password');

if (!empty($txt1)){
if (!empty($txt2)){
if (!empty($txt3)){
if (!empty($txt4)){
if (!empty($txt5)){

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}
else{

	$checkUser = "SELECT * from users where email='$txt3'";
	$result=mysqli_query($conn, $checkUser);
	$count = mysqli_num_rows($result);

	if($count > 0){
			session_start();
			$_SESSION['tmp10']="User Exists!";
			header('Location: signup.php');
	}


else{
	$sql="INSERT INTO `users`(`firstname`,lastname,`email`,mobile,`password`)
	values('$txt1','$txt2','$txt3','$txt4','$txt5')";
	
	if ($conn->query($sql)) {
		session_start();
		$_SESSION['tmp10']="New record is inserted successfully! Please Login.";
		header('Location: signup.php');

	}
	else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
	$conn->close();
}
}
}
else{
	echo "First Name should not be empty";
	die();  
}
}
else{
	echo "Last Name should not be empty";
	die();
}
}
else{
	echo "Email should not be empty";
	die();
}
}
else{
	echo "Mobile should not be empty";
	die();
}
}
else{
	echo "Password should not be empty";
	die();
}


?>