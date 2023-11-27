<?php

if ($loggedInUser['role'] != 'instructor') {
    header('Location: /503.php');
}

   
    
?>