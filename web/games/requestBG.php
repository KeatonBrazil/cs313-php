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

$query = 'SELECT member_id FROM game.member WHERE username = :user';
$stmt = $db->prepare($query);
$stmt->bindValue(':user', $username, PDO::PARAM_STR);
$stmt->execute();
$mem_id = $stmt->fetchAll(PDO::FETCH_ASSOC);

$mem_id = $mem_id[0]['member_id'];
$title = htmlspecialchars($_POST['title']);
$tlm = htmlspecialchars($_POST['tlm']);
$comp = htmlspecialchars($_POST['comp']);
$num_players = htmlspecialchars($_POST['num_p']);
$pub0 = htmlspecialchars($_POST['pub0']);
$pub1 = htmlspecialchars($_POST['pub1']);
$pub2 = htmlspecialchars($_POST['pub2']);
$pub3 = htmlspecialchars($_POST['pub3']);
$pub4 = htmlspecialchars($_POST['pub4']);
$pub5 = htmlspecialchars($_POST['pub5']);
$desc = htmlspecialchars($_POST['desc']);

$tlm = intval($tlm);
$comp = floatval($comp);
$num_players = intval($num_players);

if ($tlm === "") {
    $tlm = 0;
}
if ($comp === "") {
    $comp = 0;
}
if ($num_players === "") {
    $num_players = 0;
}

$query = 'INSERT INTO game.requestG (title, time_length_min, complexity, num_players, descript, member_id) VALUES (:title, :tlm, :comp, :num_p, :desk, :mem_id)';
$stmt = $db->prepare($query);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':tlm', $tlm, PDO::PARAM_INT);
$stmt->bindValue(':comp', $comp, PDO::PARAM_INT);
$stmt->bindValue(':num_p', $num_players, PDO::PARAM_INT);
$stmt->bindValue(':desk', $desc, PDO::PARAM_STR);
$stmt->bindValue(':mem_id', $mem_id, PDO::PARAM_INT);
$result = $stmt -> execute();

$query = 'SELECT lastval()';
$stmt = $db->prepare($query);
$stmt -> execute();
$g_id = $stmt -> fetchAll(PDO::FETCH_ASSOC);
$g_id = $g_id[0]['lastval'];

$purbs = array($pub0, $pub1, $pub2, $pub3, $pub4, $pub5);
$count = count($purbs);

for ($i=0; $i < $count; $i++){
    if ($purbs[$i] != "") {
        $query = 'INSERT INTO game.requestP (pub_name, member_id) VALUES (:pub, :mem_id)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':pub', $purbs[$i], PDO::PARAM_STR);
        $stmt->bindValue(':mem_id', $mem_id, PDO::PARAM_INT);
        $result = $stmt -> execute();

        $query = 'SELECT lastval()';
        $stmt = $db->prepare($query);
        $stmt -> execute();
        $p_id = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        $p_id = $p_id[0]['lastval'];

        $query = 'INSERT INTO game.requestBG (requestG_id, requestP_id) VALUES (:g_id, :p_id)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':g_id', $g_id, PDO::PARAM_INT);
        $stmt->bindValue(':p_id', $p_id, PDO::PARAM_INT);
        $result = $stmt->execute();
        
    }
}

$admin = 'Admin';
$query = 'SELECT email FROM game.member WHERE username = :admi';
$stmt = $db->prepare($query);
$stmt->bindValue(':admi', $admin, PDO::PARAM_STR);
$stmt->execute();
$email = $stmt->fetchAll(PDO::FETCH_ASSOC);
$email = $email[0]['email'];
$subject = "Board Game Request";
$message = "You have recieved a Board Game request on epicsharks.herokuapp.com/games/admin.php";
$headers = "From: $username";
mail("jamessantbusiness@gmail.com", $subject, $message, $headers);

header("location: newGame.php?thankyou = TRUE");
die();

?>