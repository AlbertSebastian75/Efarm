<?php
    session_start();
  	unset($_SESSION['users_id']);
  	unset($_SESSION['user']);
  	header('Location: ../login/login.php');
?>