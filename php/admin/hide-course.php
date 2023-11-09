<?php
session_start();
include('../inc/db-connect.php');
include('../auth/_check-loggedin.php');
include('../auth/_check-admin.php');

// 
$id= $_GET['id'];
$sql = "UPDATE courses SET is_hidden='1' WHERE id='$id'";
$result = $conn->query($sql);


// redirect to /my courses
header('Location: /admin/courses.php?message=Updated successfully!');

?>
