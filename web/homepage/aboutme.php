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
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <script type="text/javascript" src="homepage.js"></script>
    <title>Epic Sharks | About Me</title>
</head>
<body>
    <header class = "header">
        <h1>About Me</h1>
    </header>
    <div class="navbar sticky">
        <a class="link" href="homepage.php">Welcome</a>  
        <a class="link" href="assignments.php">Assignments</a>              
    </div>
    <div class = "container2">
        <div class = "item_left">
            <img id="us" class = "pic" src="us.jpg" alt="A photo of me and my wife" onclick="changePic()">
        </div>
        <div class = "item_right">
            <div>
                <p id="pbaby">
                    My wife and I car having a baby!
                </p>
            </div>
        </div>
    </div>

</body>
</html>