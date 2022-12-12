<?php
require "connect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST)) {
        $fullName = $_POST['fullname'];
        $userName = $_POST['username'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $password = $_POST["user_password"];
        $gender = $_POST['gender'];

        $query = "INSERT INTO users(full_name, user_name, user_password, email, phone_number, gender, time_created) 
    VALUES ('$fullName', '$userName', '$password', '$email', '$number', '$gender', current_date())";

        $result = mysqli_query($mysqli, $query);
        if ($result) {
            $_SESSION["username"] = $_POST["fullname"];
            header("Location: dashboard.php");

        } else {
            echo "<div class='container'>";
            echo "<div>An error occured</div>";
            echo "<a href='register.php'>Click here to try again</a>";
            echo "<a href='home.php'>Click here to go back home</a>";
            echo "</div>";
            ;
        }

    } else {
        echo "<div class='container'>";
        echo "<div>The form should not be empty!</div>";
        echo "<a href='register.html'>Try again</a>";
        echo "</div>";
    }
} else {
    header("Location: register.html");
}





?>