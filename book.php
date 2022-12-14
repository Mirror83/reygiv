<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
}
require_once "connect.php";

$query = <<<query
    SELECT * FROM properties
    WHERE property_id={$_GET['property_id']}
    query;
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/CSS/book.css">
    <link rel="stylesheet" href="./assets/CSS/index.css">
    <title>Book/Add to Basket</title>
</head>

<body>
    <?php if (isset($row)) {?>
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
    <h1>Property details</h1>
    <div class="property-container">
        <div class="property-picture" style="background-image: url(<?php echo $row["image_url"] ?>.jpg)">
        </div>
        <div class="details">
            <p> <b>Name:</b>
                <?php echo $row["property_name"] ?>
            </p>
            <p> <b>Location:</b>
                <?php echo $row["property_location"] ?>
            </p>
            <p> <b>Classification:</b>
                <?php echo $row["classification"] ?>
            </p>
            <p> <b>Rent:</b>
                <?php echo $row["rent"] ?>
            </p>
            <p> <b>Available rooms:</b>
                <?php echo $row["available_rooms"] ?>
            </p>
            <div>
                <p> <b>Description</b></p>
                <p>
                    <?php echo $row["property_description"] ?>
                </p>
            </div>
            <div class="buttons">
                <?php
                if ($row["available_rooms"] > 0) {
                    echo <<<html
                    <form method="POST" action="action_book.php">
                        <input type="hidden" name="property_id" value="{$row["property_id"]}">
                        <button id="book_btn">Book</button>
                    </form>
                html;
                } else {
                    echo "<div class='full'>No more openings are currently available.</div>";
                }
                ?>
                <form method="POST" action="action_basket.php">
                    <input type="hidden" name="property_id" value="<?php echo $row["property_id"] ?>">
                    <button id="basket_btn">Add to basket</button>
                </form>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <div class='error-state-container'>
        <h2>We could not find the requested property.</h2>
        <a href='properties.php'>Back to properties</a>
    </div>
    <?php
        die(); }?>;
</body>

</html>