<?php
session_start();

$success = $_GET['success'];

if (isset($_POST['user']) && isset($_POST['pass']))
{
    //Store user and password
    $username = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['pass']);

    //Get database
    require_once("gamesDb.php");
    $db = get_db();

    //Find password with username in database
    $query = 'SELECT pass_word FROM game.member WHERE username = :username';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':username', $username);
    $result = $stmt->execute();
    if ($result)
    {
        $row = $stmt->fetch();
        //Get password from database
        $hashedPassword = $row['pass_word'];
        
        //verifies if stored password matches password in database
        if (password_verify($password, $hashedPassword))
        {
            $_SESSION['username'] = $username;
            
            header("Location: main.php");
            die();
            
        }
        else 
        {
            $badLogin = TRUE;
        }
    }
    else
    {
        $badLogin = TRUE;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="games.css">
    <link rel="icon" href="shark.png" type="image/gif">
    <title>Shark Games | Login</title>
</head>
<body>
    <header><h1>Shark Games</h1><p><h4>Build Your Shelf</h4></p></header>  
    <div class="sticky">
        <ul class="nav">
        <li class="active"><a href="login.php">Login</a></li>
        <li><a href="signUp.php">Sign up</a></li>
        </ul>
    </div>   
    <div class="login center">
        <form action='login.php' method='post'>
        <?php if ($success) {echo "<p><strong>Congratulations! Your account has been Created.</strong></p>";}?>
        <input type="text"  name="user" placeholder="Username"/><br><br>
        <input type="password"  name="pass" placeholder="Password"/><br>
        <p><?php if ($badLogin) {echo "<span class='red'>Your username or password is incorrect</span>";} ?></p>
        <input class="submit" type="submit" value="Login">
        </form>
    </div>
</body>
</html>

