
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <style>
		body{
			background-image: url('../css/image/img5.jpeg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
		a.a2{
    		text-decoration: underline;
 			color: burlywood;
    		text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
    		font-size: 75px;
		}
        a.a1{
			text-decoration: none;
			background-color:lavender;
            color:blue;
			font-size:20px;
			padding: 20px 35px;
			border-radius:12px;
			border:2px solid turquoise;
			margin:150px;
            line-height:85px;
        }   
		a.a1:hover {
  			background-color: darkgray;
			  padding: 25px 45px;
		}    
		a.a2:hover {
  			background-color: linen;
			  padding: 25px 45px;
		}    
        .topnav {
            background-color: darkgreen;
            overflow: hidden;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }

        .topnav-right {
            float: right;
        }        
        .top {
            color: indigo;
            font-size: 25px;
        }
            
        .b1
        {
          width: 25%;
          padding: 12px 20px;
          margin: 8px 0;
          border: 1px solid #ccc;
          border-radius: 5px;
          box-sizing: border-box;
          font-size: 18px;
        }        
        
        .b2
        {
          width: 100%;
          padding: 10px 20px;
          margin: 8px 0;
          border: 1px solid #ccc;
          border-radius: 5px;
          box-sizing: border-box;
          font-size: 18px;
        }
        .b8
        {
            width: 200px;
            background-color: darkgrey;
            color: darkred;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 20px;
            font-weight:bold;
            margin-right:16px;
        }    
        .s1 
        {
          width: 150px;
          background-color: cornsilk;
          color: darkblue;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          font-size: 20px;
        }
        table {
        width: 35%;
        text-align: center;
        }
        th{
          color:dodgerblue;
          font-size:28px;
        }
        td{
          font-size:25px;
        }        
		p.error{
			color:darkred;
			font-size:35px;
		}
    </style>

    <center><h1><a class="a2" href="../index.php">E-FARM ADMIN</a></h1></center>

<div class="top">
<!--Search Code-->
<form method="post" action="search.php">
<b>Search Items:</b>
<input type="text" class="b1" name="search" placeholder="Enter the product name here...">
<input type="submit" class="s1" name="submit">
</form>
<!--Search End-->

    <div class="topnav">
    <a class="a3" href="admin_home.php">Home</a>
    <a class="a3" href="insert_item.php">Add Item</a></li>
    <a class="a3" href="insert_user.php">Add User</a>

    <div class="topnav-right">
    <a class="a3" href="view_item.php">Manage Products</a>
    <a class="a3" href="view_user.php">Manage Users</a>
    <a class="a3" href="a_logout.php">Log Out</a>

    </div>
    </div>

<?php

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

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}
else{


	$checkItem = "SELECT * from items where `name`='$txt1' and `brand`='$txt2'";
	$result6=mysqli_query($conn, $checkItem);
	$count6 = mysqli_num_rows($result6);

	if($count6 > 0){
			die("<center><h1 style=color:red>Item Exist!</h1><center>");
	}


	$sql="INSERT INTO `items`(`name`,brand,`description`,types,price,stock)
	values('$txt1','$txt2','$txt3','$txt4','$txt5','$txt6')";
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
	echo "Stock should not be empty";
	die();
}
}
else{
	echo "Brand should not be empty";
	die();
}
}
else{
	echo "Description should not be empty";
	die();
}
}
else{
	echo "Types should not be empty";
	die();
}
}
else{
	echo "Price should not be empty";
	die();
}
}
else{
	echo "Stock should not be empty";
	die();
}

?>