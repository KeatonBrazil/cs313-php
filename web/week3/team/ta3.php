<?php 
    $name = $_POST["name"];
    $email = $_POST["email"];
    $major = $_POST["major"];
    $comment = $_POST["comments"];

    $continent = $_POST["continent"];
    $count = count($continent);
    for ($x=0; $x < $count; $x++) {
        echo ($continent[$x] . "<br>");
    }

?>