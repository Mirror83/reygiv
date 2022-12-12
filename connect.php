<?php
$host = "localhost";
$user = "your database username";
$password = "your database password";
$database_name = "reygiv"; // Or whatever you decide to name the database
// $user = "root";
// $password = "cementceiling";
// $database_name = "reygiv";

$mysqli = mysqli_connect($host, $user, $password, $database_name)
    or die("Unable to connect<br>" . mysqli_error($mysqli));