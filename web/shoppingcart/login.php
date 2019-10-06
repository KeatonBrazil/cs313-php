<?php 
    session_start();

    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="shark.png" type="image/gif">
    <link rel="stylesheet" type="text/css" media="screen" href="shopping.css" />
    <title>Epic Sharks | Login</title>
</head>
<body>
    <header><h1>Epic Shark Games</h1></header>
    <div class="logindiv">
        <form action="browse.php" method="post">
            <input type="text" placeholder="Enter Name" name="user"><br>
            <input type="submit" value="Login">
        </form>
    </div>
    
</body>
</html>