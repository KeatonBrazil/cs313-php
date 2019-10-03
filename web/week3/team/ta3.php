<?php 
    $name = $_POST["name"];
    $email = $_POST["email"];
    $major = $_POST["major"];
    $comment = $_POST["comments"];

    $continent = $_POST["continent"];
    $count = count($continent);
    for ($x=0; $x < $count; $x++) {

        if ($continent[$x] == "na") {
            echo "North America<br>"; 
        } elseif ($continent[$x] == "sa") {
             echo "South America<br>";
        } elseif ($continent[$x] == "eu") {
            echo "Europe<br>";
        } elseif ($continent[$x] == "as") {
            echo "Asia<br>";
        } elseif ($continent[$x] == "aus") {
            echo "Australia<br>";
        } elseif ($continent[$x] == "af") {
            echo "Africa<br>";
        } else echo "Antarctica<br>";

    }

    

    

?>