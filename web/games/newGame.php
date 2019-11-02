<?php
session_start();

if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}
else
{
	header("Location: login.php");
	die();
}

require_once("gamesDb.php");
$db = get_db();

$no_title = $_GET['no_title'];
$no_pub = $_GET['no_pub'];
$tlm_no_int = $_GET['tlm_no_int'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="games.css">
    <script src="game.js"></script>
    <link rel="icon" href="shark.png" type="image/gif">
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
    If the board game you desire does not exist within the database<br> 
    you may request to add a board game by filling in the information 
    below<br>Required Fields: <span class="red">*</span><br><br>
    
        <form action="requestBG.php" onsubmit="return validate()" method="post">
            Board Game Title: <span class="red">*</span><br>
            <input type="text" id="tit" name="title"><br>
            <p id="noTitle"><span class='red good' >You must include a title</span><p>
            Estimated Time Length (minutes): <br>
            <input type="text" id="tlmin" name="tlm"><br>
            Complexity Rating (<a href="https://boardgamegeek.com/browse/boardgame">Board Game Geek</a>):<br>
            <input type="text" id="cmplx" name="comp"><br>
            Max Number of Players<br>
            <input type="text" id="nplayers" name="num_p"><br>
            Select the number of Publishers
            <select id="num_pub" onchange="numPub()">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            <div id="show_pub">Publisher 1:<span class='red'>*</span><br><input type='text' id='pub1' name='pub0'><br></div>
            <p>Please leave a description if you are not sure <br>if any of the information is correct.</p>
            <textarea name="desc" id='text' cols="30" rows="10"></textarea><br>
            <input class="confirm" type="submit" value="Request">
        </form>
        <input class="delete" type="button" value="Reset" onclick="reset()">
    </div>
<script>
function validate() {
    var title = document.getElementById("tit");
    var time_length = document.getElementById("tlmin");
    var comp = document.getElementById("cmplx");
    var nplayers = document.getElementById("nplayers");
    var pub1 = document.getElementById("pub1");
    var pub2 = document.getElementById("pub2");
    var pub2 = document.getElementById("pub3");
    var pub2 = document.getElementById("pub4");
    var pub2 = document.getElementById("pub5");
    var pub2 = document.getElementById("pub6");

    if (title.value === "" || title.value === null) {
        document.getElementById("noTitle").style.display = "block";
        console.log(title.value);
        console.log("bad");
        return false;
    } 
    console.log(title.value);
    console.log("good");
    return true;

}
</script>
</body>
</html>