<?php
    require_once "connect.php";
    session_start();
    if (!isset($_SESSION["username"])){
        header("Location: login.php");
    }
    $query = <<<QUERY
    SELECT * FROM properties;
    QUERY;

    $result = mysqli_query($mysqli, $query);     

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/CSS/index.css">
    <link rel="stylesheet" href="./assets/CSS/properties.css">
    <title>Properties</title>
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

    <section class="description">
        <h1>Properties</h1>
        <p>Here, you can pick the property that you wish to view at a glance</p>
    </section>
    <section class="properties-section">
        <div class="grid-container">
            <div class="grid-view">
                <?php
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)){
                        echo <<<html
                        <div class="properties prop$count" 
                        style="background-image: url({$row['image_url']}.jpg);"
                        >   
                            <div class="text-content">
                                <div class="name">{$row['property_name']}</div>
                                <div class="classification">{$row['classification']}</div>
                                <div class="location">{$row['property_location']}</div>
                                <div class="price">Ksh.{$row['rent']}</div>
                                <a href="book.php?property_id={$row['property_id']}">
                                    <div>View more details</div>
                                </a>
                            </div>       
                        </div>
                        html;
                        $count++;
                    }
                ?>
            </div>
        </div>
    </section>

    <?php include "footer.html" ?>

</body>

</html>