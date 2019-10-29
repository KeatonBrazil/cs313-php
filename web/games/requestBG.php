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

$query = 'INSERT INTO game.requestG (title, time_length_min, complexity, num_players, member_id) VALUES (:title, :tlm, :comp, :num_p, :mem_id)';




// var_dump($mem_id);
// echo "<br><br>";
// var_dump($title);
// echo "<br><br>";
// var_dump($tlm);
// echo "<br><br>";
// var_dump($comp);
// echo "<br><br>";
// var_dump($num_players);
// echo "<br><br>";
// var_dump($pub0);
// echo "<br><br>";
// var_dump($pub1);
// echo "<br><br>";
// var_dump($pub2);
// echo "<br><br>";
// var_dump($pub3);
// echo "<br><br>";
// var_dump($pub4);
// echo "<br><br>";
// var_dump($pub5);
// echo "<br><br>";
// var_dump($desc);
// echo "<br><br>";
?>