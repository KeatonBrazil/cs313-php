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

$rg_id = htmlspecialchars($_POST['requestg_id']);
$mem_id = htmlspecialchars($_POST['member_id']);
$title = htmlspecialchars($_POST['title']);
$time_len = htmlspecialchars($_POST['time_len']);
$complex = htmlspecialchars($_POST['complex']);
$num_play = htmlspecialchars($_POST['num_play']);
$rp0 = htmlspecialchars($_POST['rp0']);
$rp1 = htmlspecialchars($_POST['rp1']);
$rp2 = htmlspecialchars($_POST['rp2']);
$rp3 = htmlspecialchars($_POST['rp3']);
$rp4 = htmlspecialchars($_POST['rp4']);
$rp5 = htmlspecialchars($_POST['rp5']);
$pub0 = htmlspecialchars($_POST['pub0']);
$pub1 = htmlspecialchars($_POST['pub1']);
$pub2 = htmlspecialchars($_POST['pub2']);
$pub3 = htmlspecialchars($_POST['pub3']);
$pub4 = htmlspecialchars($_POST['pub4']);
$pub5 = htmlspecialchars($_POST['pub5']);
$desc = htmlspecialchars($_POST['desc']);



$query = 'INSERT INTO game.game (title, time_length_min, complexity, num_players) VALUES (:title, :time_len, :complex, :num_play)';
$stmt = $db->prepare($query);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':time_len', $time_len, PDO::PARAM_INT);
$stmt->bindValue(':complex', $complex, PDO::PARAM_INT);
$stmt->bindValue(':num_play', $num_play, PDO::PARAM_INT);
// $result = $stmt->execute();

// $query = 'SELECT lastval()';
// $stmt = $db->prepare($query);
// $stmt -> execute();
// $game_id = $stmt -> fetchAll(PDO::FETCH_ASSOC);
// $game_id = $game_id[0]['lastval'];

$purbs = array($pub0, $pub1, $pub2, $pub3, $pub4, $pub5);
$count = count($purbs);

for ($i=0; $i < $count; $i++){
    if ($purbs[$i] != "") {
        $query = 'SELECT publisher_id FROM game.publisher WHERE pub_name = :pub';
        $stmt = $db->prepare($query);
        $stmt->bindValue('pub', $purbs[$i], PDO::PARAM_STR);
        $stmt->execute();
        $publishers = $stmt -> fetch(PDO::FETCH_ASSOC);
        var_dump($publishers);
        // if ($publishers === false) {
        //     $query = 'INSERT INTO game.publisher (pub_name) VALUES (:pubname)';
        //     $stmt = $db->prepare($query);
        //     $stmt->bindValue(':pubname', $purbs[$i], PDO::PARAM_STR);
        //     $result = $stmt -> execute();

        //     $query = 'SELECT lastval()';
        //     $stmt = $db->prepare($query);
        //     $stmt -> execute();
        //     $pub_id = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        //     $pub_id = $pub_id[0]['lastval'];

        //     $query = 'INSERT INTO game.boardGame (game_id, publisher_id) VALUES (:g_id, :p_id)';
        //     $stmt = $db->prepare($query);
        //     $stmt->bindValue(':g_id', $game_id, PDO::PARAM_INT);
        //     $stmt->bindValue(':p_id', $pub_id, PDO::PARAM_INT);
        //     $result = $stmt->execute();

        // }
                
            
        

        
    }
}








?>