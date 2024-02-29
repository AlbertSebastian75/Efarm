<!DOCTYPE html>
<html>
<head>
	<title>Payment </title>
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
		.r4 
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
        
		.a9
		{
			width: 25%;
			padding: 12px 20px;
			margin: 8px 0;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 18px;
		}
	
		.a7{
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
    .a4{
      width:250px;
			font-size: 18px;
    }
    table {
        width: 75%;
        text-align: center;
        border-spacing: 0 10px;
        }
    th{
          color:dodgerblue;
          font-size:28px;
        }
    td{
          font-size:25px;
          color:darkmagenta;
        }
    h3{
      color:red;
      font-size:50px;
      text-align:center;
    }

        
    </style>

    <center><h1><a class="a2" href="../index.php">E-FARM</a></h1></center>

        <div class="top">
        <!--Search Code-->
        <form method="post" action="search.php">
        <b>Search: </b><input type="text" class="a9" name="search" placeholder="Search the Item here.">
        <input type="submit" name="submit"class="r4">
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
    </body>
</html>

<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

$qty=filter_input(INPUT_POST, 'qty');
$users_id=filter_input(INPUT_POST, 'users_id');

if (mysqli_connect_error()) { 
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}

    $txt7=filter_input(INPUT_POST, 'items_id');

    $sql = "SELECT * from items where items_id='$txt7';";
    $result=mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    
    if($resultCheck == 0){
      die("Invalid ID");
    }

    if($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)) {
         $items_id=$row['items_id'];
         $name=$row['name'];
         $price=$row['price'];
         $stock=$row['stock'];    
         //$pathx = "../admin/image/";
         //$file = $row["img"];
         //echo '<img src="'.$pathx.$file.'" height=100 width=100>';
        }
     }
     if($qty > $stock)
     {
       die("<h3>Insufficient Stock!</h3>");
     }
     $total=$price*$qty;
     //echo "<div>".$name."</div>";
?>

<html>
<body>
<form action="sale_connection.php" method="post">
<h2>PAYMENT MODULE</h2>

<center>
<table>

<tr><th>Users ID:</th><td> <?php echo $users_id; ?></td></tr>
<tr><th>Items ID:</th><td> <?php echo $items_id; ?></td></tr>
<tr><th>Price:</th><td> <?php echo "₹".$price." per item"; ?> </td><tr>
<tr><th>Quantity:</th><td> <?php echo $qty; ?> </td></tr>
<tr><th>Total Price:</th><td> <?php echo "₹".$total; ?></td></tr>

<?php
$price=$price;
$total=$total; 
?>

<input type="hidden"name="users_id" required readonly min="1" value=<?=$_POST['users_id']?>>
<input type="hidden"name="items_id" required readonly min="1" value=<?=$_POST['items_id']?>>
<input type="hidden"name="price" required readonly min="1" value=<?=$price?>>
<input type="hidden"name="qty" required readonly min="1" value=<?=$_POST['qty']?>>
<input type="hidden"name="total" required readonly min="1" value=<?=$total?>>

<tr><th>Card Type:</th><td>
  <select name="card_type" class="a4" required>
    <option value="" selected="selected" disabled="disabled">Select your Card Type</option>
      <option>Debit Card</option>
      <option>Credit Card</option>
  </select></td></tr>

       <tr><th>Card Name:</th>
       <td><input type="text"name="card_name" class="a4" required pattern="[A-Za-z_]+"></td></tr>

       <tr><th>Card Number:</th>
       <td><input type="password"name="card" class="a4" required pattern="[0-9]+"  minlength="16" maxlength="16" title="Invalid - 16 Digits Only" placeholder="xxxx-xxxx-xxxx-xxxx"></td></tr>
       <tr><th>Expiry(MM/YY):</th>
       <td><input type="month"name="valid" class="a4"class="a4" required  min="2022-03" max="2030-12" value="2022-03"></td></tr>

       <tr><th>CVV:</th>
       <td><input type="password"name="cvv" class="a4" required pattern="[0-9]+"  minlength="3" maxlength="3" title="Enter 3 Digit Number"placeholder="xxx"></td></tr>
      </tr>
</table>
       <br> <input type="submit"class="a7" value="PAY">  </center>
</form>
</body>
</html>

