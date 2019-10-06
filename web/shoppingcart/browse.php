<?php
    session_start();

    $_SESSION['username'] = htmlspecialchars($_POST["user"]);

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="shark.png" type="image/gif">
    <title>Epic Sharks | Browse</title>
</head>
<body>
    <header>
        <h1>Epic Shark Games</h1>
    </header>
    <?php 
        $gameName = array('Mysterium', 'Roll For The Galaxy', 'Scythe', 'Terraforming Mars');
        $gamePrice = array(40, 49, 80, 43);
        $gamePng = array('mysterium.png', 'rollGalaxy.png', 'scythe.png', 'terraformingMars.png');
        $count = count($gamePng);
        for ($x=0; $x < $count; $x++) {
            echo "<div><form name='form" . $x . "' action='' method='post'></form></div>";
        }
    ?>


</body>
</html>