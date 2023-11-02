<?php
include('../inc/db-connect.php');
include('../auth/_check-loggedin.php');

// 
$learner_id = $loggedInUser['id'];
$course_id= $_GET['course_id'];

// try to enroll course
try {
    $sql = "INSERT INTO `enrollments` (`learner_id`, `course_id`) VALUES ('$learner_id', '$course_id');";
    $result = $conn->query($sql);
} catch (Exception $e) {
    // enrolled before -> do nothing
}


// redirect to /my courses
// header('Location: /course/learn-course.php?course_id=$course_id&message=Enrolled successfully!');
header("Location: /course/enrolled-courses.php?course_id=$course_id&message=Enrolled successfully!");

?>
