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
$pub1 = $_POST['pub1'];
$pub2 = $_POST['pub2'];
$pub3 = $_POST['pub3'];
$pub4 = $_POST['pub4'];
$pub5 = $_POST['pub5'];
$desc = htmlspecialchars($_POST['desc']);
$tempLocation = "location: newGame.php";
// if (is_null($title)) {
// 	$location += "?no_title=TRUE";
// } elseif (!is_null($pub0)) {
// 	$location += "?no_pub0=TRUE";
// } if (!is_null($pub1)) {
//     header("location: newGame.php?no_pub1=TRUE");
//     die();
// } if (!is_null($pub2)) {
//     header("location: newGame.php?no_pub2=TRUE");
//     die();
// } if (!is_null($pub3)) {
//     header("location: newGame.php?no_pub3=TRUE");
//     die();
// } if (!is_null($pub4)) {
//     header("location: newGame.php?no_pub4=TRUE");
//     die();
// } if (!is_null($pub5)) {
//     header("location: newGame.php?no_pub5=TRUE");
//     die();
// } 


// header($location);
// die();
// $regex1 = '';
    
// if (preg_match($regex1, $tlm) === 0) {
//     header("location: newGame.php?tlm_no_int=TRUE");
//     die();
// }

// $regex2 = '';

// if (preg_match($regex2, $comp) === 0) {
//     header("location: newGame.php?comp_no_int=TRUE");
//     die();
// }

// if (preg_match($regex1, $num_players) === 0) {
//     header("location: newGame.php?num_p_no_int=TRUE");
//     die();
// }

// $query = 'INSERT INTO game.requestG (title, time_length_min, complexity, num_players, member_id) VALUES (:title, :tlm, :comp, :num_p, :mem_id)';
// $stmt = $db->prepare($query);
// $stmt->bindValue(':title', $title, PDO::PARAM_STR);
// $stmt->bindValue(':tlm', $tlm, PDO::PARAM_INT);
// $stmt->bindValue(':comp', $comp, PDO::PARAM_INT);
// $stmt->bindValue(':num_p', $num_players, PDO::PARAM_INT);
// $stmt->bindValue(':mem_id', $mem_id, PDO::PARAM_INT);





var_dump($mem_id);
echo "<br><br>";
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