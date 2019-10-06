
<?php
session_start();

if (isset($_POST["product"])) {
    $array = array($_POST["product"], $_POST["price"], $_POST["name"]);
    array_push($_SESSION['cart'], $array);
    header("Location: browse.php");
    die();
};
?>