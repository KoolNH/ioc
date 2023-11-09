<?php
session_start();
include('../inc/db-connect.php');
include('../auth/_check-loggedin.php');


// 
$id= $_GET['id'];

// get video by id
$sql ="SELECT * FROM `videos` WHERE id='$id' ";
$result = $conn->query($sql);
$video = $result->fetch();

// get topic by id
$sql ="SELECT * FROM `topics` WHERE id={$video['topic_id']} ";
$result = $conn->query($sql);
$topic = $result->fetch();

$sql = "DELETE FROM videos WHERE id='$id'";
$result = $conn->query($sql);


// redirect to /my courses
header("Location: /course/edit-course.php?id={$topic['course_id']}&message=Deleted successfully!");

?>
