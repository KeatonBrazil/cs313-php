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
$p_id1 = $_POST['p_id1'];
$p_id2 = $_POST['p_id2'];
$p_id3 = $_POST['p_id3'];
$p_id4 = $_POST['p_id4'];
$p_id5 = $_POST['p_id5'];

var_dump($g_id);
var_dump($p_id0);
var_dump($p_id1);
var_dump($p_id2);
var_dump($p_id3);
var_dump($p_id4);
var_dump($p_id5);


?>