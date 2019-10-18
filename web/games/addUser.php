<?php 
    $username = htmlspecialchars($_POST['uzer']);
    $password = htmlspecialchars($_POST['pw']);
    $email = htmlspecialchars($_POST['email']);
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    echo $username . $password . $email . $fname . $lname;

?>