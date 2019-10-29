<?php
session_start();

$no_user=$_GET['no_user'];
$no_pass=$_GET['no_pass'];
$no_email=$_GET['no_email'];
$no_fname=$_GET['no_fname'];
$no_lname=$_GET['no_lname'];
$user_exists=$_GET['user_exists'];
$email_exists=$_GET['email_exists'];

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
            <?php if ($no_user) {echo "<p><span class='red'>Username is required</span></p>";} ?>
            <?php if ($user_exists) {echo "<p><span class='red'>Username already exists</span></p>";} ?>
            <p>Password</p>
            <input type="password" name="pw" placeholder="password"><br>        
            <p>Confirm Password</p>
            <input type="password" name="cpw" placeholder="confirm password"><br>
            <?php if ($no_pass) {echo "<p><span class='red'>Password is required</span></p>";} ?>
            <p>Email</p>
            <input type="email" name="email" placeholder="email" maxlength="50"><br>
            <p>Confirm Email</p>
            <input type="email" name="cemail" placeholder="confirm email" maxlength="50"><br>
            <?php if ($no_email) {echo "<p><span class='red'>Email is required</span></p>";} ?>
            <?php if ($email_exists) {echo "<p><span class='red'>email already exists</span></p>";} ?>
            <p>First Name</p>
            <input type="text" name="fname" placeholder="First Name" maxlength="50"><br>
            <?php if ($no_fname) {echo "<p><span class='red'>First name is required</span></p>";} ?>
            <p>Last Name</p>
            <input type="text" name="lname" placeholder="Last Name" maxlength="50"><br><br>
            <?php if ($no_lname) {echo "<p><span class='red'>Last name is required</span></p>";} ?>
            <span class="red">All fields are required</span><br><br> 
            <input class="submit" type="submit" value="Create Account"><br>       
        </form>
    </div>
</body>
</html>