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

$thankyou = $_GET['thankyou'];

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
    <?php if ($thankyou === true) {echo "<h1>Thank you for your request!</h1><br><br>";} ?>
    If the board game you desire does not exist within the database<br> 
    you may request to add a board game by filling in the information 
    below<br>Required Fields: <span class="red">*</span><br><br>
    
        <form action="requestBG.php" onsubmit="return validate()" method="post">
            Board Game Title: <span class="red">*</span><br>
            <input type="text" id="tit" name="title" placeholder="eg. Terraforming Mars"><br>
            <p id="noTitle"><p>
            Estimated Time Length (minutes): <br>
            <input type="text" id="tlmin" name="tlm" placeholder="eg. 20"><br>
            <p id="noNum1"><p>
            Complexity Rating (<a href="https://boardgamegeek.com/browse/boardgame">Board Game Geek</a>):<br>
            <input type="text" id="cmplx" name="comp" placeholder="eg. 0.00 - 5.00"><br>
            <p id="noFloat"><p>
            Max Number of Players<br>
            <input type="text" id="nplayers" name="num_p" placeholder="eg. 8"><br>
            <p id="noNum2"><p>
            Select the number of Publishers
            <select id="num_pub" onchange="numPub()">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            <div id="show_pub">Publisher 1:<span class='red'>*</span><br><input type='text' id='pub1' name='pub0' placeholder='eg. Rio Grande Games'><br></div>
            <p id="pubs"></p>
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
    var pub3 = document.getElementById("pub3");
    var pub4 = document.getElementById("pub4");
    var pub5 = document.getElementById("pub5");
    var pub6 = document.getElementById("pub6");
    var reg1 = /(5)\.[0][0]?|[0-4]\.[0-9][0-9]?/;
    var reg2 = /\d+/;

    if (title.value === "") {
        document.getElementById("noTitle").innerHTML = "<span class='red'>You must include a title</span>";
        return false;
    }
    if (time_length.value != "") {
        if (reg2.test(time_length.value) != true) {
            document.getElementById("noNum1").innerHTML = "<span class='red'>Estimated time needs to be a whole number</span>";
            return false;
        } 
    }
    if (comp.value != "") {
        if (reg1.test(comp.value) != true) {
            document.getElementById("noFloat").innerHTML = "<span class='red'>The complexity needs to be a number between 0.00 and 5.00</span>";
            return false;
        }
    }
    if (nplayers.value != "") {
        if (reg2.test(nplayers.value) != true) {
            document.getElementById("noNum2").innerHTML = "<span class='red'>The Max number of players needs to be a whole number</span>";
            return false;
        }
    } 
    if (pub1) {
        if (pub1.value === "") {
            document.getElementById("pubs").innerHTML = "<span class='red'>Selected publisher boxes must me filled in</span>";
            return false;
        }
    } 
    if (pub2) {
        if (pub2.value === "") {
            document.getElementById("pubs").innerHTML = "<span class='red'>Selected publisher boxes must me filled in</span>";
            return false;
        }
    }
    if (pub3) {
        if (pub3.value === "") {
            document.getElementById("pubs").innerHTML = "<span class='red'>Selected publisher boxes must be filled in</span>";
            return false;
        }
    }
    if (pub4) {
        if (pub4.value === "") {
            document.getElementById("pubs").innerHTML = "<span class='red'>Selected publisher boxes must me filled in</span>";
            return false;
        }
    }
    if (pub5) {
        if (pub5.value === "") {
            document.getElementById("pubs").innerHTML = "<span class='red'>Selected publisher boxes must me filled in</span>";
            return false;
        }
    }
    if (pub6) {
        if (pub6.value === "") {
            document.getElementById("pubs").innerHTML = "<span class='red'>Selected publisher boxes must me filled in</span>";
            return false;
        }
    }
    return true;

} 
</script>
</body>
</html>