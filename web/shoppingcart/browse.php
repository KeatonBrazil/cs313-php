<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        die();
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
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
    <div id="navbar">        
        <div>
            <?php
                echo sizeof($_SESSION['cart']) . " <a class='element' href='cart.php'>cart</a>";
            ?>
        </div>       
    </div>
    <?php 
        $gameName = array('Mysterium', 'Roll For The Galaxy', 'Scythe', 'Terraforming Mars');
        $gamePrice = array(40, 49, 80, 43);
        $gamePng = array('mysterium.png', 'rollGalaxy.png', 'scythe.png', 'terraformingMars.png');
        /*
        $count = count($gamePng);
        echo "<div class='maindiv'>";

        for ($x=0; $x < $count; $x++) {
            echo "<form name='form" . $x . "' action='add.php' method='post'>";
            echo "<div class='container'>";
            echo "<div class='item1'>";
            echo "<strong>" . $gameName[$x] . "</strong><br>";
            echo "<p>Price: $" . $gamePrice[$x] . "</p><br><input type='submit' value='Add to Cart'>";
            echo "<input type='hidden' value='" . $gamePrice[$x] . "' name='price'>";
            echo "<input type='hidden' value='" . $gameName[$x] . "' name='product'></div>";
            echo "<div class='item2'>";
            echo "<img class='img' src='" . $gamePng[$x] . "' alt='Picture of the boardgame " . $gameName[$x] . "'></div>";
            echo "</form>";
        }

        echo "</div>"; */
    ?>
    <div>
        <form name="form1" action="add.php" method="post">
            <div>
                <div class="container">
                    <div class="item1">
                        <h2><?php echo $gameName[0]; ?></h2>
                        <h3><?php echo "Price: $" . $gamePrice[0]; ?></h3>
                    </div>
                    <div class="item2">
                         <?php echo "<img src='" . $gamePng[0] . "' alt='A picture of the boardgame " . $gameName . "'>"; ?>
                    </div>
                </div>
                <?php 
                    echo "<input type='hidden' value='" . $gamePrice[0] . "' name='price'>";
                    echo "<input type='hidden' value='" . $gameName[0] . "' name='product'>";                   
                    echo "<input type='submit' value='Add'>";
                ?>
            </div>
        </form>
    </div>


</body>
</html>