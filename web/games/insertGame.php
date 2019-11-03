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



?>