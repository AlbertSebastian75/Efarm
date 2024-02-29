<?php

$txt7=filter_input(INPUT_POST, 'items_id');
$txt1=filter_input(INPUT_POST, 'name');
$txt2=filter_input(INPUT_POST, 'brand');
$txt3=filter_input(INPUT_POST, 'description');
$txt4=filter_input(INPUT_POST, 'types');
$txt5=filter_input(INPUT_POST, 'price');
$txt6=filter_input(INPUT_POST, 'stock');
if (!empty($txt1)){
if (!empty($txt2)){
if (!empty($txt3)){
if (!empty($txt4)){
if (!empty($txt5)){
if (!empty($txt6)){
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



    $sql="UPDATE items SET `name`='$txt1', brand='$txt2', `description`='$txt3', types='$txt4', price='$txt5', stock='$txt6' where items_id='$txt7'";
    		
	$checkUser = "SELECT * from items where items_id='$txt7'";
	$result=mysqli_query($conn, $checkUser);
	$count = mysqli_num_rows($result);
	if($count == 0){
		die("Invalid ID");
	}


	if ($conn->query($sql)) {
		header("Location:view_item.php");
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
}
else{
	echo "Stock should not be empty";
	die();
}
}
else{
	echo "Price should not be empty";
	die();
}
}
else{
	echo "Types should not be empty";
	die();
}
}
else{
	echo "Description should not be empty";
	die();
}
}
else{
	echo "Brand should not be empty";
	die();
}
}
else{
	echo "Name should not be empty";
	die();
}

?>