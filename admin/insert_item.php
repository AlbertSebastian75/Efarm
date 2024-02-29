<?php
    session_start();
    if(!isset($_SESSION['usr']))
    {
        header('Location:verify.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
 <title><?php echo $_SESSION['usr']; ?> | Home</title>
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
<br>
  <form method="post" action="insert_item_connection.php">
    <center>  <table>
                <tr><th>Item Name:</th><td>
                <input type="text" class="b2" name="name" required pattern="[a-zA-Z0-9 ]+"  autofocus>
                <td></tr><tr><th>Product Brand:</th><td>
                <input type="text" class="b2" name="brand" required pattern="[a-zA-z ]+" title="No Numbers">
                <td></tr><tr><th>Description:</th><td>
                <input type="text" class="b2" name="description" pattern="[a-zA-z0-9. ]+" title="No special characters" required>
                <td></tr><tr><th>Types</th><td>
                <input list="types" class="b2" name="types" placeholder="Select From List" required pattern="[A-Z]+" title="Capital Letters Only">
                <datalist id="types">
                    <option value="FERTILIZER">
                    <option value="HERBICIDE">
                    <option value="INSECTICIDES">
                    <option value="PESTICIDES">
                    <option value="SPICES">
                    <option value="VEGETABLE">
                    <option value="FRUIT">
                    <option value="WAGON">
                    <option value="TOOLS">
                    <option value="MOTOR">
                    <option value="EARTHMOVER">
                    <option value="TRACTOR">
                    <option value="HARVESTER">
                    <option value="SPRAYER">
                    <option value="OTHER">
                </datalist>
                <td></tr><tr><th>Price:</th><td>
                <input type="number" class="b2" name="price" min="1" required>
                <td></tr><tr><th>Stock:</th><td>
                <input type="number" class="b2" name="stock" min="1" required><td></tr>
    </table>
                <input type="submit" class="b8" value="ADD ITEM">
    </center></form>
