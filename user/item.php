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
	<title>Items | <?php echo $_SESSION['user'] ?></title>
</head>
<body>

  <style> 
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
        
      input[type=text]{
        width: 25%;
        padding: 12px 20px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 18px;
        }
        
      input[type=submit] {
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
<b>Search: </b><input type="text" name="search" placeholder="Search the Item here.">
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
<br><br>
  <table align="center" border="1" bgcolor="LightGoldenRodYellow">
		<tr>
			<th>ITEM_ID</th>
			<th>NAME</th>
			<th>BRAND</th>
			<th>DESCRIPTION</th>
			<th>TYPES</th>
			<th>PRICE</th>
			<th>STOCK</th>
			<th>IMAGE</th>
			<th>VIEW</th>
		</tr><tr></tr>
 <?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}

        $sql = "SELECT * from items;";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       if($resultCheck > 0){
           while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['items_id'] ."</td>";
            echo "<td>".$row['name'] ."</td>";
            echo "<td>".$row['brand'] ."</td>";
            echo "<td>".$row['description'] ."</td>";
            echo "<td>".$row['types'] ."</td>";
            echo "<td>₹".$row['price'] ."</td>";
            echo "<td>".$row['stock'] ."</td>";
            $pathx = "../admin/image/";
            $file = $row["img"];
            echo "<td>";
            echo '<img src="'.$pathx.$file.'" height=100 width=100>';
            echo "</td>";
            echo "<td><a href=item_individual.php?items_id=".$row['items_id']. "><button>View</button></a></td></tr>";
            $items_id=$row['items_id'];

            //review from sales table
            /*$items_id1=$row['items_id'];
            $sql1 = "SELECT * from sales where items_id='$items_id1'";
            $result1=mysqli_query($conn, $sql1);
            $resultCheck1 = mysqli_num_rows($result1);
            if($resultCheck1 > 0){
              while ($row = mysqli_fetch_assoc($result1)) {
                echo "<td>".$row['review'] ." ";   
              }
            }*/
            //end of review

            echo "<tr></tr><tr></tr></tr>";
           }
       }
?>
</table>
</body>
</html>