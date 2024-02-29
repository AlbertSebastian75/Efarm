<?php

$txt6=filter_input(INPUT_POST, 'users_id');

if (!empty($txt6)){

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}


else{


    $sql="DELETE FROM users where users_id='$txt6'";
	
	$checkUser = "SELECT * from users where users_id='$txt6'";
	$result=mysqli_query($conn, $checkUser);
	$count = mysqli_num_rows($result);
	if($count == 0){
		die("Invalid ID");
	}
	
	
	if($conn->query($sql)) {
		header("Location:view_user.php");
	}
	else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
	$conn->close();

}
}
else{
	echo "ID should not be empty";
	die();
}

?>