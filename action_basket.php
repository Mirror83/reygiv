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
    $query2 = "SELECT property_name FROM properties
    WHERE property_id = {$_POST['property_id']}";
    $result2 = mysqli_query($mysqli, $query2);
    $row = mysqli_fetch_assoc($result2);
    echo "<p>{$row['property_name']} added to basket</p>";
    echo "<a href='dashboard.php'>Back to dashboard</a>";
}




echo "User {$_SESSION['username']} added property_id {$_POST['property_id']} to basket";