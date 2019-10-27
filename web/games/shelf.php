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

$query = 'SELECT member_id, username FROM game.member WHERE username = :username';
$stmt = $db->prepare($query);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->execute();
$user_id = $stmt->fetchAll(PDO::FETCH_ASSOC);

$mem_id = $user_id[0]['member_id'];


$query = 'SELECT bg.game_id, title, time_length_min, complexity, num_players FROM game.collection c LEFT JOIN game.boardGame bg ON c.boardGame_id = bg.boardGame_id LEFT JOIN game.game g ON g.game_id = bg.game_id  WHERE shelf_id = (SELECT shelf_id FROM game.gameShelf WHERE member_id = :mem_id)';
$stmt = $db->prepare($query);
$stmt->bindValue(':mem_id', $mem_id, PDO::PARAM_INT);
$stmt->execute();
$game_info = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    </div>  
    <div class="white">
        <form action="addGame.php" method="post">
            <input type="text" name="title">
            <input class="submit" type="submit" value="Search">
        </form>
        <?php 
            $g_count = count($game_info);
            for ($i=0; $i < $g_count; $i++) {
                $query = 'SELECT pub_name FROM game.boardGame bg LEFT JOIN game.publisher p ON bg.publisher_id = p.publisher_id WHERE game_id = :g_id';
                $stmt = $db->prepare($query);
                $stmt->bindValue(':g_id', $game_info[$i]['game_id'], PDO::PARAM_INT);
                $stmt->execute();
                $pub = $stmt->fetchAll(PDO::FETCH_ASSOC);

                echo "<div class='post'>";
                echo $game_info[$i]['title'].'<br><hr>';
                echo 'Publisher: ';
                $p_count = count($pub);
                for ($x=0; $x < $p_count; $x++) {
                    if ($x > 0) {
                        echo ', ';
                    }
                    echo $pub[$x]['pub_name'];                    
                }
                echo "</div><br>";
            }
        ?>
    </div>       
</body>
</html>