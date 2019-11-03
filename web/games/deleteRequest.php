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

$rp0 = htmlspecialchars($_POST['rp0']);
$rp1 = htmlspecialchars($_POST['rp1']);
$rp2 = htmlspecialchars($_POST['rp2']);
$rp3 = htmlspecialchars($_POST['rp3']);
$rp4 = htmlspecialchars($_POST['rp4']);
$rp5 = htmlspecialchars($_POST['rp5']);
$rg_id = htmlspecialchars($_POST['requestg_id']);
$mem_id = htmlspecialchars($_POST['member_id']);

$rps = array($rp0, $rp1, $rp2, $rp3, $rp4, $rp5);

for ($i=0; $i < count($rps); $i++) {
    if ($rps[$i] != "") {
        $query = 'DELETE FROM game.requestBG WHERE requestG_id = :g_id AND requestP_id = :p_id';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':g_id', $rg_id, PDO::PARAM_INT);
        $stmt->bindValue(':p_id', $rps[$i], PDO::PARAM_INT);
        $result = $stmt->execute();

        $query = 'DELETE FROM game.requestP WHERE requestP_id = :p_id';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':p_id', $rps[$i], PDO::PARAM_INT);
        $result = $stmt->execute();

    }
}

$query = 'DELETE FROM game.requestG WHERE requestG_id = :g_id';
$stmt = $db->prepare($query);
$stmt->bindValue(':g_id', $rg_id, PDO::PARAM_INT);
$result = $stmt->execute();

header("location: admin.php");
die();
?>