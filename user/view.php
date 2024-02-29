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
    <title><?php echo $_GET['choice'].' | '.$_SESSION['user'] ?></title>
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
<br>

<table align="center" border="1" bgcolor="LightGoldenRodYellow">
<?php
        if(($_SERVER["REQUEST_METHOD"] == "GET"))
        {
$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}
      $txt=$_GET['choice'];
        $sql = "SELECT * from items  where types='$txt'";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       
       if($resultCheck > 0){
        echo "<tr>";
        echo "<th>ITEM_ID</th>";
        echo "<th>NAME</th>";
        echo "<th>BRAND</th>";
        echo "<th>DESCRIPTION</th>";
        echo "<th>TYPES</th>";
        echo "<th>PRICE</th>";
        echo "<th>STOCK</th>";
        echo "<th>IMAGE</th>";
        echo "<th>VIEW</th>";
        echo "</tr>";
        
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
            }
        }
    }
        ?>

</table>

<table>
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
</table>
</body>
</html>
