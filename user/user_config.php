<?php
      $host="localhost";
      $dbusername = "root";
      $dbpassword = "";
      $dbname = "alb";
      
      $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
      if (mysqli_connect_error()) {
          die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
        }
    
        $txt1=filter_input(INPUT_POST, 'users_id');
    //session_start();
    if(!isset($_SESSION['users_id']))
    {
      header('Location: ../login/login.php');
    }


      if (!empty($txt1)){
      $checkUser =$txt1->getdata();
      $result=mysqli_query($conn, $checkUser);
      $count = mysqli_num_rows($result);

      if($count > 0){
      $row = mysqli_fetch_assoc($result);
      $_SESSION['user']=$row['firstname'];
      $_SESSION['users_id']=$row['users_id']; 
      }    
  }

?>