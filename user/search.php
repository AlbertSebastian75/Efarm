<!DOCTYPE html>
<html>
<head>
	<title>Search | Item</title>
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
        
    h3{
      color:red;
      font-size:50px;
      text-align:center;
    }

      table {
        width: 100%;
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

</body>
</html>

<?php
$con = new PDO("mysql:host=localhost;dbname=alb",'root','');
if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `items` WHERE name like '%$str%'");
	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();
	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table align="center" border="1" bgcolor="LightGoldenRodYellow">
		
			<tr><th>ITEM ID</th><td><?php echo $row->items_id; $items_id=$row->items_id;?></td></tr>
			<tr><th>NAME</th><td><?php echo $row->name; ?></td></tr>
			<tr><th>BRAND</th><td><?php echo $row->brand; ?></td></tr>
			<tr><th>DESCRIPTION</th><td><?php echo $row->description;?></td></tr>
			<tr><th>TYPES</th><td><?php echo $row->types;?></td></tr>
			<tr><th>PRICE</th>	<td><?php echo $row->price;?></td></tr>
			<tr><th>STOCK</th>	<td><?php echo $row->stock;?></td></tr>
			<tr><th>IMAGE</th>  <td><?php $pathx = "../admin/image/";
                $file = $row->img;
                echo '<img src="'.$pathx.$file.'" height=100 width=100>';?></td>
			</tr>
<?php 
	}
		else{
			die("<h3>Product: Not Found!</h3>");
		}
}

?>

<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

//review
//echo "<tr><td><b><u>Reviews:</u></b></td></tr>";
//echo $items_id;
$sql1 = "SELECT * from sales where items_id='$items_id'";
$result1=mysqli_query($conn, $sql1);
$resultCheck1 = mysqli_num_rows($result1);
if($resultCheck1 > 0){
   while ($row = mysqli_fetch_assoc($result1)) {
    echo "<tr><th>REVIEW </th><td>".$row['review'] ." ";
   }
echo "</td></tr>";
}
echo "</table>";

?>
