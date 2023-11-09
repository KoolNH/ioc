<?php
session_start();
include('../inc/db-connect.php');
include('../auth/_check-loggedin.php');
include('../auth/_check-admin.php');

// 
$id= $_GET['id'];
$sql = "UPDATE users SET is_active='0' WHERE id='$id'";
$result = $conn->query($sql);


// redirect to /my courses
header('Location: /admin/learners.php?message=Updated successfully!');

?>
