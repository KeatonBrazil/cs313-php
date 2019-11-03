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
$rp6 = htmlspecialchars($_POST['rp6']);
$desc = htmlspecialchars($_POST['desc']);

var_dump($rg_id);
echo "<br>";
echo $mem_id;
echo "<br>";
echo $title;
echo "<br>";
echo $time_len;
echo "<br>";
echo $complex;
echo "<br>";
echo $num_play;
echo "<br>";
echo $rp0;
echo "<br>";
echo $rp1;
echo "<br>";
echo $rp2;
echo "<br>";
echo $rp3;
echo "<br>";
echo $rp4;
echo "<br>";
echo $rp5;
echo "<br>";
echo $rp6;
echo "<br>";
echo $desc;

?>