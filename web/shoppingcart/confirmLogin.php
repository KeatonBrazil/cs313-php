<?php
    $_SESSION['username'] = htmlspecialchars($_POST["user"]);
    header("Location: browse.php");
?>