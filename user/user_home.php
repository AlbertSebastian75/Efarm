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
	<title>Welcome | <?php echo $_SESSION['user'] ?></title>
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
		input[type=submit] 
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
    </style>

    <center><h1><a class="a2" href="../index.php">E-FARM</a></h1></center>

        <div class="top">
        <!--Search Code-->
        <form method="post" action="search.php">
        <b>Hi, <?php echo $_SESSION['user'] ?>. Shop With Us!&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;
        Search: </b><input type="text" name="search" placeholder="Search the Item here.">
        <input type="submit" name="submit">
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
<table><center>
        <tr><td><a class="a1" href="view.php?choice=FERTILIZER">FERTILIZER</a></td>
        <td><a class="a1" href="view.php?choice=HERBICIDE">HERBICIDE&emsp;&ensp;</a></td>
        <td><a class="a1" href="view.php?choice=INSECTICIDES">INSECTICIDES</a></td></tr>
        <tr><td><a class="a1" href="view.php?choice=PESTICIDES">PESTICIDES</a></td>
        <td><a class="a1" href="view.php?choice=SPICES">SPICES&emsp;&ensp;&ensp;&ensp;&ensp;&ensp;</a></td>
        <td><a class="a1" href="view.php?choice=VEGETABLE">VEGETABLE&emsp;&ensp;</a></td></tr>
        <tr><td><a class="a1" href="view.php?choice=FRUIT">FRUIT&emsp;&ensp;&ensp;&ensp;</a></td>
        <td><a class="a1" href="view.php?choice=WAGON">WAGON&emsp;&ensp;&ensp;&ensp;&ensp;</a></td>
        <td><a class="a1" href="view.php?choice=TOOLS">TOOLS&emsp;&ensp;&ensp;&ensp;&ensp;&ensp;</a></td></tr>
        <tr><td><a class="a1" href="view.php?choice=MOTOR">MOTOR&emsp;&ensp;&ensp;</a></td>
        <td><a class="a1" href="view.php?choice=EARTHMOVER">EARTHMOVER</a></td>
        <td><a class="a1" href="view.php?choice=TRACTOR">TRACTOR&emsp;&ensp;&ensp;</a></td></tr>
        <tr><td><a class="a1" href="view.php?choice=HARVESTER">HARVESTER</a></td>
        <td><a class="a1" href="view.php?choice=SPRAYER">SPRAYER&emsp;&ensp;&ensp;&ensp;</a></td>
        <td><a class="a1" href="view.php?choice=OTHER">OTHER&emsp;&ensp;&ensp;&ensp;&ensp;</a></td></tr>
    </table></center>
    </body>
</html>