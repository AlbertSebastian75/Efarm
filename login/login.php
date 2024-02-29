<!DOCTYPE html>
<html>
<head>
	<title>Login | Efarm</title>
</head>
<body>
<style>
		body{
			background-image: url('../css/image/img4.jpg');
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
			font-size:20px;
			padding: 10px 25px;
			border-radius:12px;
			border:2px solid turquoise;
			margin:50px;
		}
		b{
			font-size:20px;
			color:darkred;
			margin:25px;
		}
		td{
			padding:5px;
		}
		p.error{
			color:maroon;
			font-size:35px;
		}
		a:hover {
  			background-color: darkgray;
			padding: 15px 35px;
		}
		input[type=email], [type=password] 
		{
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
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
	<center>
	<h1>E-FARM</h1>
	<h2>Login</h2>
	<form action="login_connection.php" method="POST" enctype="multipart/form-data">

		<table>
		<tr><td><b>Email:</b></td>
		<td><input type="email" name="email" required placeholder="Email" autofocus></td></tr>
		<tr><td><b>Password:</td></b>
		<td><input type="password" name="password" required placeholder="Password"><td></tr>
	</table>

	<br><input type="submit" value="Login">
	<br><br><br>
	<?php
		session_start();
		    if(isset($_SESSION['tmp']))
		    {
				echo '<br><p class="error">'.$_SESSION['tmp'].'</p>';
		    	unset($_SESSION['tmp']);
		    }
		?>

		<br>
		<a class="a1" href="reset.php">Forgot Password ?</a>
		<br><br><br><br><br><br>
		<a class="a1" href="../signup/signup.php">Sign Up</a>
		<a class="a1" href="../index.php">Home</a>
	</form>
	</center>
</body>
</html>