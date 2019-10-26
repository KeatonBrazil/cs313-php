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

$query = 'SELECT member_id, username FROM game.member WHERE username = :username';
$stmt = $db->prepare($query);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->execute();
$user_id = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($user_id);
//$mem_id = $user_id[0]['member_id'];
//echo $mem_id;

//$query = 'SELECT title, time_length_min, complexity, num_players, pub_name FROM game.collection c LEFT JOIN game.boardGame bg ON boardGame_id = boardGame_id LEFT JOIN game.game g ON game_id = game_id LEFT JOIN game.publisher p ON publisher_id = publisher_id WHERE shelf_id = (SELECT shelf_id FROM game.gameShelf WHERE member_id = :mem_id)';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="games.css">
    <link rel="icon" href="shark.png" type="image/gif">
    <script src="game.js"></script>
    <title>Shark Games | Shelf</title>
</head>
<body>
    <header><h1>Your Shelf</h1></header>  
    <div class="sticky" id="return">
        <ul class="nav">
        <li class="menu" onclick="hide()">Menu</li>
        <div id="dude">
        <li class="mylink"><a href="main.php">Hub</a></li>
        <li class="active mylink"><a href="shelf.php">Game Shelf</a></li>
        <li class="mylink"><a href="wish.php">Wish List</a></li>
        <li class="mylink"><a href="friends.php">Friends</a></li>
        <?php if ($username === 'Admin') {echo "<li class='mylink'><a href='admin.php'>Admin</a></li>";} ?>
        <li class="mylink"><a href="newGame.php">Request New Game</a></li>
        <li class="floatright mylink"><a href="signOut.php">Sign Out</a></li>
        <li class="floatright user">Welcome <?php echo $username; ?></li>
    </div>    
    <div class="white">

    </div>       
</body>
</html>