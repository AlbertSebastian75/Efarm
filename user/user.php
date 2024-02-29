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
      table {
        width: 75%;
        text-align: center;
        border-spacing: 1em .9em;
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
</form></div><center><br><br>

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
    $txt1 = $_SESSION['users_id'];
        $sql = "SELECT * from users where users_id='$txt1'";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       if($resultCheck > 0){
           while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
           // echo "<td>".$row['users_id'] ."</td>";
            echo "<th>First Name </th><td>".$row['firstname'] ."</td></tr>";
            echo "<tr><th>Last Name </th><td>".$row['lastname'] ."</td></tr>";
            echo "<tr><th>Email </th><td>".$row['email'] ."</td></tr>";
            echo "<tr><th>Mobile </th><td>".$row['mobile'] ."</td></tr>";
            //echo "<td> ".$row['password'] ."</td>";
            echo "<tr><th>Address </th><td> ".$row['adr'] ."</td>";
            echo "</tr>";
          
           }
       }
?>

</table>     
<br><br>

<a href="account_address.php"><button class="a7">ADD ADDRESS</button></a>
<a href="account_edit.php"><button class="a7">UPDATE</button></a>
<a href="account_delete.php"><button class="a7">DELETE</button></a>

</body>
</html>
