<?php

$user = ""; // Your MYSQL username
$password = ""; // Your MYSQL password 
$database_name = "reygiv"; // Or whatever you decided to name yours

$mysqli = mysqli_connect($host, $user, $password, $database_name)
    or die("Unable to connect<br>" . mysqli_error($mysqli));