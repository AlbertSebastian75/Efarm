<!DOCTYPE html>
<html>
<head>
    <title>SignUp | Efarm</title>
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
			color:darkred;
			font-size:35px;
		}
		p.msg{
			color:darkred;
			font-size:35px;
		}
		a:hover {
  			background-color: darkgray;
			padding: 15px 35px;
		}
		input[type=email], [type=password], [type=text]
		{
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 15px;
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
    <h1>Efarm</h1>
	<h2>Sign Up</h2>

	<!--signup successful message -->
	<?php
			session_start();
		    if(isset($_SESSION['tmp10']))
		    {
				echo '<br><p class="error">'.$_SESSION['tmp10'].'</p>';
		    	unset($_SESSION['tmp10']);
		    }
		?>

			
  <form method="post" action="signup_connection.php"> 
	  <table>
  				<tr><td><b>First Name:</b></td>
				<td><input type="text" name="firstname" required pattern="[A-Za-z_]+" title="No Numbers and Spaces(Use _)" autofocus></td></tr>
    			<tr><td><b>Last Name:</b></td>
    			<td><input type="text" name="lastname" required pattern="[A-Za-z_]+" title="No Numbers and Spaces,(Use _)"></td></tr>
    			<tr><td><b>Email:</b></td>
    			<td><input type="email"  name="email" required></td></tr>
    			<tr><td><b>Mobile:</b></td>
    			<td><input type="text" name="mobile" required minlength="10" maxlength="10" required pattern="[0-9]+"></td></tr>
    			<tr><td><b>Password:</b></td>
    			<td><input type="password" name="password" required minlength="6" pattern="[^' ']+" title="No Spaces" placeholder="Mininum: 6 Characters"></td></tr>
	</table>
    			<br><input type="submit" value="Sign Up"><br><br>	
				<br><br>
		<a class="a1" href="../login/login.php">Login</a>
		<a class="a1" href="../index.php">Home</a>
    </form>
	</center>		
</body>
</html>