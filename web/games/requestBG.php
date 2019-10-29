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
$mem_id = $stmt->execute();

$title = $_POST['title'];
$tlm = $_POST['tlm'];
$comp = $_POST['comp'];
$num_players = $_POST['num_p'];
$pub0 = $_POST['pub0'];
$pub1 = $_POST['pub1'];
$pub2 = $_POST['pub2'];
$pub3 = $_POST['pub3'];
$pub4 = $_POST['pub4'];
$pub5 = $_POST['pub5'];
$desc = $_POST['desc'];

var_dump($title);
echo "<br><br>";
var_dump($tlm);
echo "<br><br>";
var_dump($comp);
echo "<br><br>";
var_dump($num_players);
echo "<br><br>";
var_dump($pub0);
echo "<br><br>";
var_dump($pub1);
echo "<br><br>";
var_dump($pub2);
echo "<br><br>";
var_dump($pub3);
echo "<br><br>";
var_dump($pub4);
echo "<br><br>";
var_dump($pub5);
echo "<br><br>";
var_dump($desc);
echo "<br><br>";
?>