<?php
   $loggedIn = false;
    
   if(isset($_SESSION['username'])) {
       $loggedIn = true;
   }

   // if not logged in -> redirect to login
   if($loggedIn == false){
       header('Location:/auth/login.php');
   }

   $username = $_SESSION['username'];
?>