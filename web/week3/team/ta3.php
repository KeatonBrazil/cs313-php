<?php 
    $name = $_POST["name"];
    $email = $_POST["email"];
    $major = $_POST["major"];
    $comment = $_POST["comments"];

    $continent = $_POST["continent"];
    $count = count($continent);
    for ($x=0; $x < $count; $x++) {

        if ($continent[$x] == "na") {
            echo "North America<br>"; }
             if else ($continent[$x] == "sa") {
                 echo "South America<br>"; }
        // } if else ($continent[$x] == "eu") {
        //     echo "Europe<br>";
        // } if else ($continent[$x] == "as") {
        //     echo "Asia<br>";
        // } if else ($continent[$x] == "aus") {
        //     echo "Australia<br>";
        // } if else ($continent[$x] == "af") {
        //     echo "Africa<br>";
        // } else echo "Antarctica<br>";

    }

    

    

?>