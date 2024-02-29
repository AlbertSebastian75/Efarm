<!DOCTYPE html>
<html>
<head>
    <title>Admin | Upload Item</title>
</head>
<body>
  <header>
    <h1>Upload @ Image</h1>
  <table>

<?php

$txt7=filter_input(INPUT_POST, 'items_id');

if (!empty($txt7)){

$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "alb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}



else{
  $checkUser = "SELECT * from items where items_id='$txt7'";
	$result=mysqli_query($conn, $checkUser);
	$count = mysqli_num_rows($result);
	if($count == 0){
    session_start();
    $_SESSION['tmp77']="Invalid ID";
    die('Location: item_image.php');
	}

 
  $msg = "";

  if (isset($_POST['upload'])) {
  
    $img = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];	
      $folder = "image/".$img;
      
  
      $sql="UPDATE items SET `img`='$img' where items_id='$txt7'";
      mysqli_query($conn, $sql);
      
      if (move_uploaded_file($tempname, $folder)) {
        header('Location: view_item.php');
      }else{
        session_start();
        $_SESSION['tmp7']="Please choose the image!";
        header('Location: item_image.php');
    }
  }
  
  
	}
	$conn->close();

}
else{
  session_start();
  $_SESSION['tmp8']="ID should not be empty!";
  header('Location: item_image.php');
}

?>
<html>
<head>
    <title>Admin | Imaage Item</title>
</head>
<body>
    <ul>
      <li><a href="admin_home.php">Home</a></li>
      <li><a href="view_item.php">View</a></li>
      <li><a href="a_logout.php">Log Out</a></li>
    </ul>
  </nav>
</table>
</body>
</html>