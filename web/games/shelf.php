<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="games.css">
    <title>Shark Games | Shelf</title>
</head>
<body>
    <header><h1>Your Shelf</h1></header>  
    <div class="sticky">
        <ul class="nav">
        <li><a href="main.php">Hub</a></li>
        <li class="active"><a href="shelf.php">Game Shelf</a></li>
        <li><a href="wish.php">Wish List</a></li>
        <li><a href="friends.php">Friends</a></li>
        <li class="floatright"><a href="signOut.php">Sign Out</a></li>
        </ul>
    </div>   
</body>
</html>