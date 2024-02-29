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
    		
            $sql="DELETE FROM users where users_id='$txt1'";
	
			$checkUser = "SELECT * from users where users_id='$txt1'";
			$result=mysqli_query($conn, $checkUser);
			$count = mysqli_num_rows($result);
			if($count == 0){
				die("Invalid ID");
			}
			
            if($conn->query($sql)) {
				header('Location: ../login/login.php');
            }
            else{
                echo "Error: ".$sql."<br>".$conn->error;
            }
    }
?>