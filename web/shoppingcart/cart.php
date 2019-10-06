<?php 
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="shark.png" type="image/gif">
    <link rel="stylesheet" type="text/css" media="screen" href="shopping.css" />
    <title>Epic Sharks | Cart</title>
</head>
<body>
    <header>
        <?php echo $_SESSION['username'] . "'s Cart"; ?>
    </header>
    <div id="navbar">
        <div>
            <a class="element" href="browse.php">browse</a>
        </div>   
    <?php
        $cart = $_SESSION['cart'];
        var_dump($cart);
    ?>     
    </div>
    <?php 
    ?>
    
</body>
</html>