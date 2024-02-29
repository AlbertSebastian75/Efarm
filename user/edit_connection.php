<?php
    if(($_SERVER["REQUEST_METHOD"] == "POST"))
    {
		$host="localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "alb";
		
		$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
		
		
		if (mysqli_connect_error()) {
				die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
			}
			
    		$txt1=$_POST['users_id'];
    		$txt2=$_POST['firstname'];
    		$txt3=$_POST['lastname'];
    		$txt5=$_POST['mobile'];
    		$txt6=$_POST['password'];
    		
			$sql="UPDATE users SET `firstname`='$txt2', lastname='$txt3', mobile='$txt5', `password`='$txt6' where users_id='$txt1'";

			$checkUser = "SELECT * from users where users_id='$txt1'";
			$result=mysqli_query($conn, $checkUser);
			$count = mysqli_num_rows($result);
			if($count == 0){
				die("Invalid ID");
			}
			
            if($conn->query($sql)) {
				header('Location: user.php');
            }
            else{
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
?>