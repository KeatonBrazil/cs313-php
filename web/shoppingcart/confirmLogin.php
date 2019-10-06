<?php
    session_start();
    $_SESSION['username'] = htmlspecialchars($_POST["user"]);
    header("Location: browse.php");
?>