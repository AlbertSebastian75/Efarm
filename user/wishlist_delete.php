<?php

$txt7=$_GET['items_id'];

if (!empty($txt7)){

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}



else{


    $sql="DELETE FROM wishlist where items_id='$txt7'";
	
	$checkUser = "SELECT * from items where items_id='$txt7'";
	$result=mysqli_query($conn, $checkUser);
	$count = mysqli_num_rows($result);
	if($count == 0){
		die("Invalid ID");
	}
	
	
	if($conn->query($sql)) {
        session_start();
        $_SESSION['tmp']="Item Removed from Wishlist Successfully!";
		header('Location:view_wishlist.php');
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