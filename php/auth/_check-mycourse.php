<?php



if ($loggedInUser['id'] != $course['instructor_id']) {
    header('Location: /503.php');
}
    
?>