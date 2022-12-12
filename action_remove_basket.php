<?php
session_start();

require "connect.php";


$query = "DELETE FROM basket WHERE property_id = {$_POST['property_id']}";

$result = mysqli_query($mysqli, $query);

if ($result) {
    echo "User {$_SESSION['username']} removed property_id {$_POST['property_id']} from basket";
}
