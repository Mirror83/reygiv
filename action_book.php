<?php
session_start();
require "connect.php";

if ($_SESSION["hasBooked"] == 0) {
    $query = "INSERT INTO bookings(user_id, property_id, time_booked)
    VALUES(
        (SELECT user_id FROM users
        WHERE full_name = '{$_SESSION['username']}'),
        {$_POST['property_id']},
        current_date()
    )"
    ;

    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        echo "<p>Unable to update the bookings table</p>";
    }

    $query = "UPDATE properties
    SET available_rooms = available_rooms - 1
    WHERE property_id = {$_POST['property_id']}";

    $_SESSION["hasBooked"] = 1;

    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        echo "<p>Unable to update the number of rooms</p>";
    }

    $query = "DELETE FROM basket
    WHERE user_id = {$_SESSION["userID"]}
    AND property_id = {$_POST['property_id']}";

    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        echo "<p>Unable to remove associated basket entry</p>";
    }

    $query = "UPDATE users 
    SET has_booked = 1
    WHERE full_name = '{$_SESSION['username']}'";

    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        echo "<p>Unable to update the booked status for the user</p>";
    } else {
        header("Location: dashboard.php");
    }
} else {
    echo "<p>You have already booked a property.</p>";
    echo "<a href='dashboard.php'>Back to dashboard</a>";
}



?>