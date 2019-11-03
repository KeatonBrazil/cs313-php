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

$g_id = $_POST['newGame'];
$p_id0 = $_POST['p_id0'];

$query = 'SELECT member_id FROM game.member WHERE username = :user';
$stmt = $db->prepare($query);
$stmt->bindValue(':user', $username, PDO::PARAM_STR);
$stmt->execute();
$mem_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
$mem_id = $mem_id[0]['member_id'];

$query = 'SELECT shelf_id FROM game.gameShelf WHERE member_id = :mem_id';
$stmt = $db->prepare($query);
$stmt->bindValue(':mem_id', $mem_id, PDO::PARAM_STR);
$stmt->execute();
$shelf_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
$shelf_id = $shelf_id[0]['shelf_id'];

$query = 'SELECT boardGame_id FROM game.boardGame WHERE game_id = :game_id AND publisher_id = :pub_id';
$stmt = $db->prepare($query);
$stmt->bindValue(':game_id', $g_id, PDO::PARAM_INT);
$stmt->bindValue(':pub_id', $p_id0, PDO::PARAM_INT);
$stmt->execute();
$bg_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
$bg_id = $bg_id[0]['boardgame_id'];

$query = 'INSERT INTO game.collection (shelf_id, boardGame_id) VALUES (:shelf, :bg_id)';
$stmt = $db->prepare($query);
$stmt->bindValue(':shelf_id', $shelf_id, PDO::PARAM_INT);
$stmt->bindValue(':bg_id', $bg_id, PDO::PARAM_INT);
$result = $stmt->execute();

header("location: shelf.php");
die();

?>