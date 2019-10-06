<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['username'] = htmlspecialchars($_POST["user"]);
        if ($_SESSION['username'] == '') {
            header("Location: login.php");
            die();
        }
    }
    
    session_destroy();
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
        for ($x=0; $x < $count; $x++) {
            echo "<div class='maindiv'><form name='form" . $x . "' action='' method='post'>";
            echo "<div class='container'>";
            echo "<div class='item1'>";
            echo "<strong>" . $gameName[$x] . "</strong><br>";
            echo "<p>Price: $" . $gamePrice[$x] . "</p></div>";
            echo "<div class='item2'>";
            echo "<img class='img' src='" . $gamePng[$x] . "' alt='Picture of the boardgame " . $gameName[$x] . "'></div>";
            echo "</form></div><br><hr><br>";
        }
    ?>


</body>
</html>