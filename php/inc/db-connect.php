<?php

// connect DB
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=ioc", $username, $password);

} catch(PDOException $e) {
    die('Under maintaiance please comback later');
}



?>