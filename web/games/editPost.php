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

$post_id = $_POST['post_id'];

$query = 'SELECT post_id, comment, post_time, post_date FROM game.post WHERE post_id=:post_id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
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
    <script src="game.js"></script>
    <title>Shark Games | Hub</title>
</head>
<body>
    <div class="center white">
        <form action="updatePost.php">
            <textarea name="newPost" cols="30" rows="10">
                <?php 
                    echo $comments[0]['comment'];
                ?>
            </textarea><br><br>
            <?php echo "<input type='hidden' name='post_id' value='".$post_id."'>"; ?>     
            <input class="confirm left" type="submit" value="Edit">       
        </form>
        <input class="delete right" type="button" value="Cancel" onclick="cancel()"><br><br>
    </div>    
</body>
</html>