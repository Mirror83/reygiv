<?php
require_once "connect.php";
session_start();
if (!isset($_SESSION["username"])) {
  header("Location: login.php");
}
$query = <<<QUERY
    SELECT * FROM basket;
    QUERY;

$result = mysqli_query($mysqli, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Basket</title>
  <link rel="stylesheet" href="./assets/CSS/book.css">
  <link rel="stylesheet" href="./assets/CSS/index.css">
</head>

<body>
  <div class="top-content">
    <header>
      <nav class="navbar">
        <a href="#" class="nav-branding">Reygiv Properties</a>
        <ul class="nav-menu">
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="properties.php" class="nav-link">Properties</a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">Log out</a>
          </li>
        </ul>
        <div class="hamburger">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </nav>
    </header>
  </div>
  <div class="basket-container">
    <h1> My Basket</h1>
    <div class="my-baskets">
      <?php
      $query = "SELECT p.property_name, b.basket_entry_id, p.property_location, p.rent, b.property_id, classification, date_created, p.image_url
      FROM properties p
      JOIN basket b
      ON p.property_id = b.property_id
      WHERE b.user_id = (SELECT user_id FROM users
          WHERE full_name = '{$_SESSION['username']}')
      ";

      $result = mysqli_query($mysqli, $query);
      $row = mysqli_fetch_assoc($result);
      $count = 1;
      while ($row = mysqli_fetch_assoc($result)) {
        echo <<<html
            <div></div>
            <div class="text-content">
                <img src="{$row['image_url']}.jpg" class="image" style="width: 100px;"/>
                <div class="name">{$row['property_name']}</div>
                <div class="classification">{$row['classification']}</div>
                <div class="location">{$row['property_location']}</div>
                <div class="price">Ksh.{$row['rent']}</div>
                <a href="basket_details.php?property_id={$row['property_id']}">
                    <div>View more details</div>
                </a>
            </div>
        </div>
        html;
      }
      ?>
    </div>
  </div>
</body>

</html>