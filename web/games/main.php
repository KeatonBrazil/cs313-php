<?php
session_start();
$username = htmlspecialchars($_POST['user']);
$password = htmlspecialchars($_POST['pass']);
$_SESSION['username'] = $username;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="shark.png" type="image/gif">
    <link rel="stylesheet" href="games.css">
    <title>Shark Games | Hub</title>
</head>
<body>
    <header><h1>Shark Hub</h1></header>  
    <div class="sticky">
        <ul class="nav">
        <li class="active"><a href="main.php">Hub</a></li>
        <li><a href="shelf.php">Game Shelf</a></li>
        <li><a href="wish.php">Wish List</a></li>
        <li><a href="friends.php">Friends</a></li>
        <li class="floatright"><a href="signOut.php">Sign Out</a></li>
        <li class="floatright user">Welcome <?php echo $username; ?></li>
        </ul>
    </div>   
</body>
</html>