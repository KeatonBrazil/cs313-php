<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['username'] = htmlspecialchars($_POST["user"]);
        if ($_SESSION['username'] == '') {
            header("Location: login.php");
            die();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="shark.png" type="image/gif">
    <link rel="stylesheet" type="text/css" media="screen" href="shopping.css" />
    <title>Epic Sharks | Browse</title>
</head>
<body>
    <header>
        <h1>Epic Shark Games</h1>
        <h2>Welcome <?php echo $_SESSION['username'] ?></h2>
    </header>
    <?php 
        $gameName = array('Mysterium', 'Roll For The Galaxy', 'Scythe', 'Terraforming Mars');
        $gamePrice = array(40, 49, 80, 43);
        $gamePng = array('mysterium.png', 'rollGalaxy.png', 'scythe.png', 'terraformingMars.png');
        $count = count($gamePng);

        echo "<div class='maindiv'>";

        for ($x=0; $x < $count; $x++) {
            echo "<form name='form" . $x . "' action='add.php' method='post'>";
            echo "<div class='container'>";
            echo "<div class='item1'>";
            echo "<strong>" . $gameName[$x] . "</strong><br>";
            echo "<p>Price: $" . $gamePrice[$x] . "</p><br><input type='submit' value='Add to Cart'>";
            echo "<input type='hidden' value='" . $gamePrice . "' name='price'><input type='hidden' value='" . $gameName . "' name='product'></div>";
            echo "<div class='item2'>";
            echo "<img class='img' src='" . $gamePng[$x] . "' name='" . $gamePng . "' alt='Picture of the boardgame " . $gameName[$x] . "'></div>";
            echo "</form>";
        }

        echo "</div>";

    ?>


</body>
</html>