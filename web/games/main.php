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

    $query = 'SELECT post_id, comment FROM game.post ORDER BY post_id DESC';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // $query = 'SELECT member_id, username FROM member';
    // $stmt = $db->prepare($query);
    // $stmt->execute();
    // $user_id = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // $mem_id = 0;
    // foreach ($user_id as $member) {
    //     if ($member['username'] === $username) {
    //         $mem_id = $member['member_id'];
    //     }
    // }


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
    <div class="white">
        <div>
            <form action="addPost.php" method="post">
                <textarea name="tarea" cols="30" rows="10"></textarea><br>
                <input type="submit" value="Post"><br>
            </form><br>
        </div>
        <div>
            <?php 
                foreach ($comments as $comment) {
                    $post = $comment['comment'];
                    
                    echo $post . "<br>";
                }           
            
            ?>
        </div>
    </div>
</body>
</html>