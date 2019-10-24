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

    $com = $_POST['tarea'];    

    $query = 'SELECT member_id, username FROM game.member';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $user_id = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $mem_id = 0;
    foreach ($user_id as $member) {
        if ($member['username'] === $username) {
            $mem_id = $member['member_id'];
        }
    }


    date_default_timezone_set("America/Denver");
    $time = date("h:i:sa");
    
    $query = 'INSERT INTO game.post (comment, post_time, post_date, member_id) VALUES (:comment, :post_time, :post_date, :mem_id)';
    $stmt = $db ->prepare($query);
    $stmt->bindValue(':comment', $com, PDO::PARAM_STR);
    $stmt->bindValue(':post_time', $time, PDO::PARAM_STR);
    $stmt->bindValue(':post_date', '\'now()\'', PDO::PARAM_STR);
    $stmt->bindValue(':mem_id', $mem_id, PDO::PARAM_INT);
    $newcomment = $stmt->execute();

    flush();
    header("Location:main.php");
    die();

?>