<?php
session_start();
include('../inc/db-connect.php');
include('../auth/_check-loggedin.php');


/* check if my course */
// get course with id
$id =  $_GET['id'];
$sql ="SELECT * FROM `courses` WHERE id='$id' ";
$result = $conn->query($sql);
$course = $result->fetch();

include('../auth/_check-mycourse.php');
/* END check if my course */

// 
$id= $_GET['id'];
$sql = "DELETE FROM courses WHERE id='$id'";
$result = $conn->query($sql);


// redirect to /my courses
header('Location: /course/my-courses.php?message=Deleted successfully!');

?>
