
<?php
session_start();
if (isset($_POST["product"])) {
    $array = array($_POST["product"], $_POST["price"]);
    array_push($_SESSION['cart'], $array);
    }
var_dump($_POST["product"]);
echo "<br>";
var_dump($_POST["price"]);
echo "<br>";
var_dump($array);
?>