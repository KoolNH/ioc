<?php

include('../inc/db-connect.php');

    session_start();
   $loggedIn = false;
    
   if(isset($_SESSION['username'])) {
       $loggedIn = true;
   }

   // if not logged in -> redirect to login
   if($loggedIn == false){
       header('Location:/auth/login.php');
   }

   $username = $_SESSION['username'];

   // get user with username
    $sql ="SELECT * FROM `users` WHERE username='$username' ";
    $result = $conn->query($sql);
    $loggedInUser = $result->fetch();
?>