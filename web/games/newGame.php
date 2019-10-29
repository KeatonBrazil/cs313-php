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
    <div class="white center">
    If the board game desire does not exist within the database<br> 
    you may request to add a board game by filling in the information 
    below<br>Required Fields: <span class="red">*</span><br><br>
    
        <form action="requestBG.php" method="post">
            Board Game Title: <span class="red">*</span><br>
            <input type="text" name="title"><br>
            Estimated Time Length (minutes): <br>
            <input type="text" name="tlm"><br>
            Complexity Rating (<a href="https://boardgamegeek.com/browse/boardgame">Board Game Geek</a>):<br>
            <input type="text" name="comp"><br>
            Max Number of Players<br>
            <input type="text" name="num_p"><br>
            Select the number of Publishers
            <select id="num_pub" onchange="numPub()">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            <div id="show_pub"></div>
            <p>Please leave a description if you are not sure <br>if any of the information is correct.</p>
            <textarea name="desc" cols="30" rows="10"></textarea><br>
        </form>

    </div>

</body>
</html>