<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}
	
$txt1=filter_input(INPUT_POST, 'users_id');
$txt2=filter_input(INPUT_POST, 'items_id');
$txt3=filter_input(INPUT_POST, 'price');
$txt4=filter_input(INPUT_POST, 'qty');
$txt5=filter_input(INPUT_POST, 'total');
date_default_timezone_set("Asia/Kolkata");
$txt6=date('y-m-d H:i:s');


	$sql="INSERT INTO `sales`(`users_id`,items_id,qty,`total`,`date`)
	values('$txt1','$txt2','$txt4','$txt5','$txt6')";

	
	//update stock of items   
	//$stock = "SELECT stock from items where items_id='$txt2'";
    $sql1="UPDATE items SET stock=stock-'$txt4' where items_id='$txt2'";
	
	if ($conn->query($sql1)) {
	if ($conn->query($sql)) {		
		header('Location: user_order.php');	
	}}

?>
