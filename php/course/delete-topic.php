<?php
include('../inc/db-connect.php');
include('../auth/_check-loggedin.php');

// 
$id= $_GET['id'];

$sql ="SELECT * FROM `topics` WHERE id='$id' ";
$result = $conn->query($sql);
$topic = $result->fetch();

$sql = "DELETE FROM topics WHERE id='$id'";
$result = $conn->query($sql);


// redirect to /my courses
header("Location: /course/edit-course.php?id={$topic['course_id']}&message=Deleted successfully!");

?>
