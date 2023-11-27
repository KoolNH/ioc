<?php
   $learner_id = $loggedInUser['id'];
   $course_id = $_GET['id'];

   // get enrolment with username & course_id
    $sql ="SELECT * FROM `enrollments` WHERE learner_id='$learner_id' AND course_id='$course_id' ";
    $result = $conn->query($sql);
    $enrolment = $result->fetch();

    if( $enrolment == null ) {
        header('Location: /503.php');
    }

?>