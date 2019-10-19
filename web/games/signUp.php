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
    <link rel="stylesheet" href="games.css">
    <title>Shark Games | Friends</title>
</head>
<body>
    <header><h1>Friends</h1></header>  
    <div class="sticky">
        <ul class="nav">
        <li><a href="login.php">Login</a></li>
        <li class="active"><a href="signUp.php">Sign up</a></li>
        </ul>
    </div>   
    <div>
        <form action="addUser.php" method="post">
            <input type="text" name="uzer" placeholder="username"><br>
            <input type="password" name="pw" placeholder="password"><br>
            <input type="password" name="cpw" placeholder="confirm password"><br>
            <input type="text" name="email" placeholder="email"><br>
            <input type="text" name="cemail" placeholder="confirm email"><br>
            <input type="text" name="fname" placeholder="First Name"><br>
            <input type="text" name="lname" placeholder="Last Name"><br>
            <input type="submit" value="Add Account"><br>       
        </form>
    </div>
</body>
</html>