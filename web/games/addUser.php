<?php 
    $user = htmlspecialchars($_POST['uzer']);
    $pass = htmlspecialchars($_POST['pw']);
    $cpass = htmlspecialchars($_POST['cpw']);
    $email = htmlspecialchars($_POST['email']);
    $cemail = htmlspecialchars($_POST['cemail']);
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    
    if (!isset($user) || $user == "") {
        header("location: signUp.php");
        die();
    } elseif (!isset($pass) || $pass == "" || !isset($cpass) || $cpass == "") {
        header("location: signUp.php");
        die();
    } elseif (!isset($email) || $email == "" || !isset($cemail) || $cemail == "") {
        header("location: signUp.php");
        die();
    } elseif (!isset($fname) || $fname == "" || !isset($lname) || $lname == "") {
        header("location: signUp.php");
        die();
    } elseif ($pass != $cpass) {
        header("location: signUp.php");
        die();
    }

    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

    require_once("gamesDb.php");
    $db = get_db();

    $query = 'SELECT username FROM game.member';
    $stmt = $db -> prepare($query);
    $stmt -> execute();
    $names = $stmt -> fetchALL(PDO::FETCH_ASSOC);

    foreach ($names as $name) {
        $old_name = $name['username'];
        if ($user === $old_name) {
            header("location: signUp.php");
            die();
        }
    }

    $user_query = 'SELECT email FROM game.member';
    $statement = $db->prepare($user_query);
    $statement->execute();
    $emails = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($email as $mail) {
        $old_email = $mail['email'];
        if ($email === $old_email) {
            header("Location: signUp.php");
            die();
        }
    
    $query = 'INSERT INTO game.member (username, pass_word, first_name, last_name, email) VALUES (:user, :pass, :fname, :lname, :email)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':pass', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindValue(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $result = $stmt->execute();

    flush();
    header("Location:login.php");
    die();








?>