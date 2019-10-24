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

    $added = $_GET['return'];

    require_once("gamesDb.php");
    $db = get_db();

    $query = 'SELECT post_id, username, comment, post_time, post_date FROM game.post p LEFT JOIN game.member m ON p.member_id = m.member_id ORDER BY post_id DESC';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        <?php if ($username === 'Admin') {echo "<li><a href='admin.php'>Admin</a></li>";} ?>
        <li class="floatright"><a href="signOut.php">Sign Out</a></li>
        <li class="floatright user">Welcome <?php echo $username; ?></li>
        </ul>
    </div>   
    <div class="white">
        <div class="center">
            <a id="return"></a>
            <form action="addPost.php" method="post">
                <textarea name="tarea" cols="30" rows="10"></textarea><br>
                <input type="submit" value="Post"><br>
            </form><br>
        </div>
        <div>
            <?php 
                foreach ($comments as $comment) {
                    $post = $comment['comment'];
                    $mem = $comment['username'];
                    $tim = $comment['post_time'];
                    $dat = $comment['post_dat'];
                    
                    echo $mem . " " . $tim . " " . $dat . "<br><hr>"; 
                    echo $post . "<br><br>";
                }           
            
            ?>
        </div>
    </div>
<script>
</script>
</body>
</html>