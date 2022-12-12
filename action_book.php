<?php
session_start();
require "connect.php";


$query = "INSERT INTO bookings(user_id, property_id, time_booked)
    VALUES(
        (SELECT user_id FROM users
        WHERE full_name = '{$_SESSION['username']}'),
        {$_POST['property_id']},
        current_date()
    )"
;

$result = mysqli_query($mysqli, $query);

if ($result) {
    $query2 = "SELECT property_name FROM properties
    WHERE property_id = {$_POST['property_id']}";
    $result2 = mysqli_query($mysqli, $query2);
    $row = mysqli_fetch_assoc($result2);
    echo "<p>Sucessfully booked {$row['property_name']}</p>";
    echo "<a href='dashboard.php'>Back to dashboard</a>";
}

$query = "UPDATE properties
SET available_rooms = available_rooms - 1
WHERE property_id = {$_POST['property_id']}";

$result = mysqli_query($mysqli, $query);

if ($result) {
    echo "<p>Successfully decreased the number of rooms.</p>";
}


?>