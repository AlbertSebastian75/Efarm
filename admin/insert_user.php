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
            
        .t1
        {
          width: 25%;
          padding: 12px 20px;
          margin: 8px 0;
          border: 1px solid #ccc;
          border-radius: 5px;
          box-sizing: border-box;
          font-size: 18px;
        }
        .w1
        {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          border: 1px solid #ccc;
          border-radius: 5px;
          box-sizing: border-box;
          font-size: 18px;
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
        .w2{
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
		p.error{
			color:darkred;
			font-size:35px;
      align:center;
		}
    </style>

    <center><h1><a class="a2" href="../index.php">E-FARM ADMIN</a></h1></center>

<div class="top">
<!--Search Code-->
<form method="post" action="search1.php">
<b>Search User:&ensp;</b>
<input type="text" name="search" class="t1" placeholder="Enter the username here...">
<input type="submit" class="s1" name="submit">
</form>
<!--Search End-->
</div>

 

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

  </body>
</html>


<html>
  <body><br><br>
<center>
  <?php
			//session_start();
		    if(isset($_SESSION['tmp100']))
		    {
				echo '<br><p class="error">'.$_SESSION['tmp100'].'</p>';
		    	unset($_SESSION['tmp100']);
		    }
		?>
</center>
  <form method="post" action="insert_user_connection.php"> 
  <center> <table>
  	            <tr><th>First Name:</th><td>
    			<input type="text" name="firstname" class="w1" required pattern="[A-Za-z_]+" title="No Numbers and Spaces(Use _)" autofocus>
    			<td></tr><tr><th>Last Name:</th><td>
    			<input type="text" name="lastname" class="w1" required pattern="[A-Za-z_]+" title="No Numbers and Spaces,(Use _)">
    			<td></tr><tr><th>Email:</th><td>
    			<input type="email"  name="email" class="w1" required>
    			<td></tr><tr><th>Mobile:</th><td>
    			<input type="text" name="mobile" class="w1" required minlength="10" maxlength="10" required pattern="[0-9]+">
    			<td></tr><tr><th>Password:</th><td>
    			<input type="password" name="password" class="w1" required minlength="6" pattern="[^' ']+" title="No Spaces" ><td></tr>
       </table><br>
    		<input type="submit" class="w2" value="ADD USER"></center>
	</form>
</body>
</html>