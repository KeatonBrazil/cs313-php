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

$purbs = array($pub0, $pub1, $pub2, $pub3, $pub4, $pub5);
$count = count($purbs);

for ($i=0; $i < $count; $i++){
    if ($purbs[$i] != "") {
        $query = 'SELECT pub_name FROM game.publisher WHERE pub_name = :pub';
        $stmt = $db->prepare($query);
        $stmt->bindValue('pub', $purbs[$i], PDO::PARAM_STR);
        $stmt->execute();
        $publishers = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        if ($publishers === NULL) {
            echo "TRUE NULL";
        }
        if ($publishers === "") {
            echo "TRUE EMPTY STRING";
        }
        if (!isset($publishers)) {
            echo "TRUE NOT SET";
        } 
        if ($publishers === array(0){}) {
            echo "TRUE array(0){}";
        } 
        if ($publishers[0]['pub_name'] === "") {
            echo "TRUE publishers[0][pub_name]";
        } 
        if ($publishers[0] === {}) {
            echo "TRUE {}";
        }
                // $query = 'INSERT INTO game.publisher';
                // $stmt = $db->prepare($query);
            
        

        
    }
}








?>