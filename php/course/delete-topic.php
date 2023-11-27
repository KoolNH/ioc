<?php
session_start();
include('../inc/db-connect.php');
include('../auth/_check-loggedin.php');


// 
$id= $_GET['id'];

$sql ="SELECT * FROM `topics` WHERE id='$id' ";
$result = $conn->query($sql);
$topic = $result->fetch();

/* check if my course */
// get course with id
$course_id =  $topic['course_id'];
$sql ="SELECT * FROM `courses` WHERE id='$course_id' ";
$result = $conn->query($sql);
$course = $result->fetch();

include('../auth/_check-mycourse.php');
/* END check if my course */

$sql = "DELETE FROM topics WHERE id='$id'";
$result = $conn->query($sql);


// redirect to /my courses
header("Location: /course/edit-course.php?id={$topic['course_id']}&message=Deleted successfully!");

?>
