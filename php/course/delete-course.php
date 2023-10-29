<?php
include('../inc/db-connect.php');
include('../auth/_check-loggedin.php');

// 
$id= $_GET['id'];
$sql = "DELETE FROM courses WHERE id='$id'";
$result = $conn->query($sql);


// redirect to /my courses
header('Location: /course/my-courses.php?message=Deleted successfully!');

?>
