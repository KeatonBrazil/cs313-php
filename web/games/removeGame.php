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

$collection = $_POST['collection'];

$query = 'DELETE FROM game.collection WHERE collection_id = :col';
$stmt = $db->prepare($query);
$stmt->bindValue(':col', $collection, PDO::PARAM_INT);
$result = $stmt->execute();

header("location: shelf.php#return");
die();
?>