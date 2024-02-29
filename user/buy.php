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
        <input type="submit" class="r4" name="submit">
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
<form action="sale.php" method="POST" enctype="multipart/form-data"> 
        
<?php

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}

  $txt7=filter_input(INPUT_POST, 'items_id');

$sql = "SELECT * from items where items_id='$txt7';";
$result=mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck == 0){
  die("<h3>Invalid ID!</h3>");
}


if($resultCheck > 0){
   while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<th>Item ID</th><td>".$row['items_id'] ."</td></tr>";
    $z=$row['items_id'];
    echo "<tr><th>Name</th><td>".$row['name'] ."</td></tr>";
    echo "<tr><th>Brand</th><td>".$row['brand'] ."</td></tr>";
    echo "<tr><th>Description</th><td>".$row['description'] ."</td></tr>";
    echo "<tr><th>Type</th><td>".$row['types'] ."</td></tr>";
    echo "<tr><th>Price</th><td>₹".$row['price'] ."</td></tr>";
    echo "<tr><th>Stock</th><td>".$row['stock'] ."</td></tr>";
    $pathx = "../admin/image/";
    $file = $row["img"];
    echo "<tr><th>Image</th><td>";
    echo '<img src="'.$pathx.$file.'" height=100 width=100>';
    echo "</td>";
    echo "</tr>";
   }
}
?>

<?php
//review
$txt7=filter_input(INPUT_POST, 'items_id');
$sql = "SELECT * from sales where items_id='$txt7'";
$result=mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0){
   while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><th>Review</th><td>".$row['review'] ."</td></tr>";   
   }
}
?>

</table>






     <h2>CUSTOMER DETAILS</h2>

<table align="center" border="10" bgcolor="BlanchedAlmond">
                <!--<tr><th>User ID</th>-->
                <td><input type="hidden" name="users_id" required readonly value=<?php echo $_SESSION['users_id']  ?> ></td></tr>


<?php

$txt1 = $_SESSION['users_id'];
$sql = "SELECT * from users where users_id='$txt1'";
$result=mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0){
   while ($row = mysqli_fetch_assoc($result)) {

    if ($row['adr']==NULL){ die("<a class=update href=account_address.php>Update your address !!!</a>");}

    echo "<tr>";
   //echo "<td>".$row['users_id'] ."</td>";
    echo "<th>First Name</th><td>".$row['firstname'] ."</td></tr>";
    echo "<tr><th>Last Name</th><td>".$row['lastname'] ."</td></tr>";
    echo "<tr><th>Email</th><td>".$row['email'] ."</td></tr>";
    echo "<tr><th>Mobile</th><td>".$row['mobile'] ."</td></tr>";
    //echo "<td> ".$row['password'] ."</td>";
    echo "<tr><th>Address</th><td>".$row['adr'] ."</td></tr>";
    echo "</tr>";
   }
}
?>           

</tr>
     <tr>
         <th>Quantity</th>
       <td><input type="number"name="qty" required value="1" min="1" ></td>
       </tr>
      <tr>
        <!-- <th>Items ID</th>-->
       <td><input type="hidden" name="items_id" required readonly value=<?php echo $z ?>> </td>
</tr>  
        </table>   

 <center>       
  <input type="submit" class="a7" value="Continue">         
</form>

</body>
</html>