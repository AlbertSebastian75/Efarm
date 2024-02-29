<?php
    session_start();
    if(!isset($_SESSION['users_id']))
    {
    	header('Location: ../login/login.php');
    }
    else
    {
    	include 'user_config.php';
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Wishlist | <?php echo $_SESSION['user'] ?></title>
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
    
		.a7, input[type=submit] {
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
		}

		input[type=text]
		{
			width: 25%;
			padding: 12px 20px;
			margin: 8px 0;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 18px;
		}

    h3{
      color:red;
      font-size:50px;
      text-align:center;
    }
    .update{
      color:blue;
      font-size:25px;
    }
    table {
        width: 75%;
        text-align: center;
        }
    th{
          color:dodgerblue;
          font-size:28px;
        }
    td{
          font-size:25px;
          color:darkmagenta;
        }

    </style>

    <center><h1><a class="a2" href="../index.php">E-FARM</a></h1></center>

        <div class="top">
        <!--Search Code-->
        <form method="post" action="search.php">
        <b> Search: </b><input type="text" name="search" placeholder="Search the Item here.">
        <input type="submit" name="submit">
        </form>
        <!--Search End-->
        </div>

    <div class="topnav">
    <a class="a3" href="user_home.php">Home</a>  
    <a class="a3" href="item.php">All items</a>
    <a class="a3" href="purchase.php">Purchase</a>
    <a class="a3" href="user_order.php">My Orders</a>

    <div class="topnav-right">
    <a class="a3" href="user.php">My Account</a>
    <a class="a3" href="u_logout.php">Log Out</a>
    <a class="a3" href="../admin/verify.php">Admin</a>
    </div>
    </div>
<br>


<table align="center" border="1" bgcolor="LightGoldenRodYellow">
<form action="" method="POST" enctype="multipart/form-data"> 
        
<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}

 // $txt7=filter_input(INPUT_POST, 'items_id');
$items_id=$_SESSION['items_id'];
$users_id=$_SESSION['users_id'];

//avoid multiple wishlist
$sql2 = "SELECT * from wishlist where items_id='$items_id' and users_id='$users_id';";
$result2=mysqli_query($conn, $sql2);
$resultCheck2 = mysqli_num_rows($result2);
if($resultCheck2 > 0){
     die(header("Location:view_wishlist.php"));
}


$sql="INSERT INTO `wishlist`(`items_id`,users_id)
	values('$items_id','$users_id')";
	if ($conn->query($sql)) {
        header('Location: view_wishlist.php');
	}
	else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
	$conn->close();
    ?>

</table>
</body>
</html>