<!DOCTYPE html>
<html>
<head>
	<title>Efarm | Verify Admin</title>
</head>
<body>

<style>
		body{
			background-image: url('../css/image/img3.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
		h1{
    		text-decoration: underline;
 			color: white;
    		text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
    		font-size: 75px;
		}
		h2{
    		text-decoration: underline;
 			color: white;
    		text-shadow: 1px 1px 2px black, 0 0 25px indianred, 0 0 5px darkblue;
    		font-size: 35px;
		}
		a.a1{
			text-decoration: none;
			background-color:lavender;
			/*color: purple;*/
			font-size:25px;
			padding: 15px 35px;
			border-radius:12px;
			border:2px solid turquoise;*/
		}
		b{
			font-size:35px;
			color:darkred;
		}
		p.error{
			color:red;
			font-size:35px;
		}
		a:hover {
  			background-color: darkgray;
			padding: 15px 50px;
		}
		input[type=password]
		{
			width: 25%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 20px;
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
	<center>
	<h1>E-FARM
		<h2>Admin Login</h2>
	</h1>
	<form action="admin_home.php" method="POST">
		<b>CODE: </b><input type="password" id="CODE" name="CODE" placeholder="Enter the CODE" autofocus><br><br>
		<input type="submit" value="ENTER"><br><br><br><br><br><br>
		<?php
		session_start();
		    if(isset($_SESSION['tmp']))
		    {
				echo '<br><p class="error">'.$_SESSION['tmp'].'</p>';
		    	unset($_SESSION['tmp']);
		    }
		?>
		<br><br>
		<a class="a1" href="../index.php">HOME</a>
		</center>
	</form>
</body>
</html>