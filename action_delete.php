<?php
require "connect.php";
$query = "DELETE FROM bookings WHERE 
booking_id = {$_POST["booking_id"]}";

$result = mysqli_query($mysqli, $query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking deleted</title>
</head>

<body>
    <div class="container">
        <?php
        if ($result) {
            echo "<p>Successfully deleted!</p>";
            $query = "UPDATE properties
                SET available_rooms = available_rooms + 1
                WHERE property_id = {$_POST['property_id']}";

            $result = mysqli_query($mysqli, $query);


        } else {
            echo "<p>Unable to delete.</p>>";
            echo "<a href='dashboard.php'>Back to the dashboard</a>";
        }

        echo "<a href='dashboard.php'>Back to the dashboard</a>"; ?>
    </div>

</body>

</html>