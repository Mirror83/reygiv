<?php
session_start();

require "connect.php";


$query = "DELETE FROM basket WHERE property_id = {$_GET['property_id']} AND user_id = {$_SESSION['userID']}";

$result = mysqli_query($mysqli, $query);

if ($result) {
    header("Location: dashboard.php");
} else {
    echo "Could not remove basket entry";
}