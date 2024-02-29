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
    <title><?php echo "Wishlist | "; echo $_SESSION['user']; $u=$_SESSION['users_id'];?></title>
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
        .msg{
            color:red;
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

<?php
          //print message when item deleted from wishlist
		    if(isset($_SESSION['tmp']))
		    {
				echo '<br><p class="msg">'.$_SESSION['tmp'].'</p>';
		    	unset($_SESSION['tmp']);
		    }
		?>
        
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
        $sql = "SELECT * from wishlist where users_id=$u";
        $result=mysqli_query($conn, $sql);
       $resultCheck = mysqli_num_rows($result);
       
       if($resultCheck > 0){
        echo "<tr>";
        echo "<th>ITEMS ID</th>";
        //echo "<th>USERS_ID</th>";
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
            $items_id=$row['items_id'];
           // echo "<td>".$row['users_id'] ."</td>";
            //item from items table
                        $sql1 = "SELECT * from items where items_id=$items_id";
                        $result1=mysqli_query($conn, $sql1);
                        $resultCheck1 = mysqli_num_rows($result1);
                        if($resultCheck1 > 0){
                            while ($row = mysqli_fetch_assoc($result1)) {
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
                            }
                        }
            echo "<td><a href=item_individual.php?items_id=".$items_id. "><button>View</button></a>";
            echo "<a href=wishlist_delete.php?items_id=".$items_id. "><button>Remove</button></a></td></tr>";
            }
        }
    }
        ?>

</table>
</body>
</html>
