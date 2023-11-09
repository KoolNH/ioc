<?php

    if ($loggedInUser['role'] != 'admin') {
        header('Location: /503.php');
    }
    
?>