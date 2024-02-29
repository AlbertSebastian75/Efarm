<?php

$txt1 =$_GET['sales_id'];
//echo $txt1;
$txt2 =$_GET['review'];
//echo $txt2;

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}

else{
    $sql="UPDATE sales SET `review`='$txt2' where sales_id='$txt1'";
    
	if ($conn->query($sql)) {
		session_start();
		$_SESSION['tmp']="Review Added Successfully!";
		header('Location: user_order.php');	
	}
	else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
	$conn->close();
}
?>