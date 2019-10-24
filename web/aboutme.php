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
        <a class="link" href="index.php">Welcome</a>  
        <a class="link" href="assignments.php">Assignments</a>              
    </div>
    <div class = "container2">
        <div class = "item_left">
            <img id="us" class = "pic" src="us.jpg" alt="A photo of me and my wife" onclick="changePic()">
        </div>
        <div class = "item_right">
            <div>
                <p id="pbaby" class="intro">
                    My wife and I have been married for nearly 2 years now. 
                    We met during our first semester of college and ever 
                    since we started dating we knew we were meant to be together.
                    We are so excited for the arrival of our new baby girl in a 
                    few short months! (Click on photo)
                </p>
                <p class = "intro">
                    I have been studying at Brigham Young University of Idaho to 
                    earn my Bachelor's Degree of Science in Data Science. I am 
                    currently looking for internshios as a data scientist.
                </p>
            </div>
        </div>
    </div>
    <footer>
        <p>
            This page was designed by Keaton Sant<br>
        </p>
        <p><b>&copy; 2019 Keaton Sant<b></p>
    </footer>

</body>
</html>