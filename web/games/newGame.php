<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="games.css">
    <link rel="icon" href="shark.png" type="image/gif">
    <script src="game.js"></script>
    <title>Shark Games | Request Game</title>
</head>
<body>
    <header><h1>Request Board Game</h1></header>  
    <div class="sticky" id="return">
        <ul class="nav">
        <li class="menu" onclick="hide()">Menu</li>
        <div id="dude">
        <li class="mylink"><a href="main.php">Hub</a></li>
        <?php if ($username === 'Admin') {echo "<li class='mylink'><a href='admin.php'>Admin</a></li>";} ?>
        <li class="mylink"><a href="shelf.php">Game Shelf</a></li>
        <!--<li class="mylink"><a href="wish.php">Wish List</a></li>
        <li class="mylink"><a href="friends.php">Friends</a></li>-->
        <li class="mylink"><a href="viewGames.php">Browse Games</a></li>
        <li class="active mylink"><a href="newGame.php">Request New Game</a></li>
        <li class="floatright mylink"><a href="signOut.php">Sign Out</a></li>
        <li class="floatright user">Welcome <?php echo $username; ?></li>
        </div>  
    </div>  
    <div>
    
    </div>

</body>
</html>