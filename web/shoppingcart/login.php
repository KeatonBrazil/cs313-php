<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Epic Sharks | Login</title>
</head>
<body>
    <div>
        <form action="browse.php" method="post">
            <input type="text" placeholder="Enter Name" name="user"><br>
            <input type="submit" value="Login">
        </form>
    </div>
    
</body>
</html>