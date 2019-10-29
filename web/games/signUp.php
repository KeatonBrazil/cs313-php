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
    <header><h1>Create Account</h1></header>  
    <div class="sticky">
        <ul class="nav">
        <li><a href="login.php">Login</a></li>
        <li class="active"><a href="signUp.php">Sign up</a></li>
        </ul>
    </div>   
    <div class="white center">
        <form action="addUser.php" method="post">
            <p>Username</p>
            <input type="text" name="uzer" placeholder="username" maxlength="50"><br>
            <p>Password</p>
            <input type="password" name="pw" placeholder="password"><br>
            <p>Confirm Password</p>
            <input type="password" name="cpw" placeholder="confirm password"><br>
            <p>Email</p>
            <input type="email" name="email" placeholder="email" maxlength="50"><br>
            <p>Confirm Email</p>
            <input type="email" name="cemail" placeholder="confirm email" maxlength="50"><br>
            <p>First Name</p>
            <input type="text" name="fname" placeholder="First Name" maxlength="50"><br>
            <p>Last Name</p>
            <input type="text" name="lname" placeholder="Last Name" maxlength="50"><br><br>
            <span class="red">All fields are required</span><br><br> 
            <input class="submit" type="submit" value="Create Account"><br>       
        </form>
    </div>
</body>
</html>