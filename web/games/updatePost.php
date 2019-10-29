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
$newPost = htmlspecialchars($_POST['newPost']);

date_default_timezone_set("America/Denver");
$time = date("h:i:sa");

$query = 'UPDATE game.post SET comment=:newPost, post_time=:post_time, post_date=:post_date WHERE post_id = :post_id';
$stmt = $db ->prepare($query);
$stmt->bindValue(':newPost', $newPost, PDO::PARAM_STR);
$stmt->bindValue(':post_time', $time, PDO::PARAM_STR);
$stmt->bindValue(':post_date', '\'now()\'', PDO::PARAM_STR);
$stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
$updatecomment = $stmt->execute();

header("Location: main.php#post$post_id");
die();

?>