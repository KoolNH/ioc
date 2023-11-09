<?php
session_start();
include('../inc/db-connect.php');
include('../auth/_check-loggedin.php');

// 
$learner_id= $_GET['learner_id'];
$course_id= $_GET['course_id'];

$sql = "DELETE FROM enrollments WHERE learner_id='$learner_id' AND course_id='$course_id'";
$result = $conn->query($sql);


// redirect to /my courses
header("Location: /course/enrolled-courses.php?message=UnEnrolled successfully!");

?>
