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
    $locate = $post_id - 1;

    $query = 'DELETE FROM game.post WHERE post_id=:post_id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
    $stmt->execute();

    // header("Location: main.php#post$locate");
    // die();
?>