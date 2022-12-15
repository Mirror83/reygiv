<?php
session_start();

require "connect.php";


$query = "INSERT INTO basket(user_id, property_id, date_created)
    VALUES(
        (SELECT user_id FROM users
        WHERE full_name = '{$_SESSION['username']}'),
        {$_POST['property_id']},
        current_date()
    )";

$result = mysqli_query($mysqli, $query);

if ($result) {
    header("Location: dashboard.php");
}