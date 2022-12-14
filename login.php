<?php
session_start();

if (isset($_SESSION["username"])) {
  header("Location: dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reygiv Login Form</title>
  <link rel="stylesheet" href="./assets/CSS/form.css" />
</head>

<body>
  <div class="container">
    <div class="title">Login</div>
    <?php
    if (isset($_GET["message"])) {
      $message = $_GET["message"];
      echo "<div class='server-error'>$message</div>";
    }
    ?>
    <?php // The values within the value attribute in each input are used to make the form sticky?>
    <form action="dashboard.php" method="post">
      <div class="user-details">
        <div class="input-box">
          <span class="details">Username</span>
          <input type="text" placeholder="Enter your username..." name="username" required />
          <div class="error"></div>
        </div>
        <div class="input-box">
          <span class="details">Email</span>
          <input type="email" placeholder="e.g example@outlook.com" name="email" required />
          <div class="error"></div>
        </div>
        <div class="input-box">
          <span class="details">Password</span>
          <input type="password" placeholder="Enter your password.." name="user_password" required />
          <div class="error"></div>
        </div>
      </div>

      <div class="button">
        <input type="submit" value="Login" />
      </div>
    </form>
    <div class="register_prompt">
      Don't have an account? <a href="register.html">Click here to register</a>
    </div>
  </div>
  <script src="./assets/JS/generic_validation.js"></script>
</body>

</html>