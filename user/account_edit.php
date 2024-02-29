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
    <title><?php echo $_SESSION['user'] ?> | Account </title>
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
        .user-identity{
            font-size: 25px;
            font-weight:bold;
            color:crimson;
        } 
		.a4{
			width: 25%;
			padding: 12px 20px;
			margin: 8px 0;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 18px;
		}
		.a5 {
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
		.a6{
			width: 25%;
			padding: 12px 20px;
			margin: 8px 0;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 18px;
            color:crimson;
            font-weight:bold;
		}        
		.a7 {
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
		.a8{
			width: 35%;
			padding: 12px 20px;
			margin: 5px 0;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 18px;
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
        }
    </style>

<center><h1><a class="a2" href="../index.php">E-FARM</a></h1></center>

<div class="top">
<!--Search Code-->
<form method="post" action="search.php">
<b>Search: </b><input type="text" class="a4" name="search" placeholder="Search the Item here.">
<input type="submit" class="a5" name="submit">
</form>
<!--Search End-->
</div>

<div class="topnav">
<a class="a3" href="user_home.php">Home</a> 
<a class="a3" href="view_wishlist.php">WishList</a> 
<a class="a3" href="item.php">All items</a>
<a class="a3" href="purchase.php">Purchase</a>
<a class="a3" href="user_order.php">My Orders</a>

<div class="topnav-right">
<a class="a3" href="user.php">My Account</a>
<a class="a3" href="u_logout.php">Log Out</a>
<a class="a3" href="../admin/verify.php">Admin</a>
</div>
</div>

<br><br><div class="user-identity">
<center><form method="post" action="">
                <label>User ID:</label>
                <input type="number" class="a6" name="users_id" autofocus required readonly value=<?php echo $_SESSION['users_id'] ?> >
</form></div><center><br>

<table>
<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}

?>

    <form method="post" action="edit_connection.php">

<!--for placeholder-->
	<?php
		$host="localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "alb";
		$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
		
	$u=$_SESSION['users_id'];
	$sql1 = "SELECT * from users where users_id='$u'";
	$result1=mysqli_query($conn, $sql1);
    $resultCheck1 = mysqli_num_rows($result1);
    if($resultCheck1 > 0){
	   while ($row = mysqli_fetch_assoc($result1)) {
		$u1=$row['firstname'] ;
		$u2=$row['lastname'];
		$u3=$row['mobile'];
		$u4=$row['password'];
		
	   }
   }
	?>
<!--Placeholder end-->

                <tr><th>User ID:</th><td>
                <input type="number" name="users_id" class="a8" autofocus required readonly value=<?php echo $_SESSION['users_id'] ?> ></td></tr>
                <tr><th>First Name:</th><td>
                <input type="text" name="firstname" class="a8" value=<?php echo $u1; ?> required pattern="[A-Za-z_]+" title="No Numbers and Spaces(Use _)"></td></tr>
    			<tr><th>Last Name:</th><td>
    			<input type="text" name="lastname" class="a8" value=<?php echo $u2; ?> required pattern="[A-Za-z_]+" title="No Numbers and Spaces,(Use _)"></td></tr>
    			<tr><th>Mobile:</th><td>
    			<input type="text" name="mobile" class="a8" value=<?php echo $u3; ?> required minlength="10" maxlength="10" required pattern="[0-9]+"></td></tr>
    			<tr><th>Password:</th><td>
    			<input type="password" name="password" class="a8" value=<?php echo $u4; ?> required minlength="6" pattern="[^' ']+" title="No Spaces"></td></tr>
                
</table><br><br>
                <input type="submit" class="a7" value="UPDATE">
            </form>
   

<a href="user.php"><button class="a7">BACK</button></a>

</body>
</html>
