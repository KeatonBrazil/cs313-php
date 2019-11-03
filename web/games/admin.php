<?php
session_start();

    if ($_SESSION['username'] === "Admin")
    {
        $username = $_SESSION['username'];
    }
    else
    {
        header("Location: login.php");
        die();
    }

    require_once("gamesDb.php");
    $db = get_db();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="shark.png" type="image/gif">
    <link rel="stylesheet" href="games.css">
    <script src="game.js"></script>
    <title>Shark Games | Admin</title>
</head>
<body>
    <header><h1>Admin Portal</h1></header>  
    <div class="sticky" id="return">
        <ul class="nav">
        <li class="menu" onclick="hide()">Menu</li>
        <div id="dude">
        <li class="mylink"><a href="main.php">Hub</a></li>
        <?php if ($username === 'Admin') {echo "<li class='active mylink'><a href='admin.php'>Admin</a></li>";} ?>
        <li class="mylink"><a href="shelf.php">Game Shelf</a></li>
        <!--<li class="mylink"><a href="wish.php">Wish List</a></li>
        <li class="mylink"><a href="friends.php">Friends</a></li>-->
        <li class="mylink"><a href="viewGames.php">Browse Games</a></li>
        <li class="floatright mylink"><a href="signOut.php">Sign Out</a></li>
        <li class="floatright user">Welcome <?php echo $username; ?></li>
        </div>
        </ul>
    </div> 
    <div>
        <?php 
            $query = 'SELECT requestG_id, title, time_length_min, complexity, num_players, descript, member_id FROM game.requestG';
            $stmt = $db->prepare($query);
            $stmt -> execute();
            $requestG = $stmt->fetchAll(PDO::FETCH_ASSOC);
            

            echo "<div class='white'>";
            for ($i=0; $i < count($requestG); $i++) {
                $query = 'SELECT username FROM game.member WHERE member_id = :mem_id';
                $stmt = $db->prepare($query);
                $stmt -> bindValue(':mem_id', $requestG[$i]['member_id'], PDO::PARAM_INT);
                $stmt -> execute();
                $name = $stmt->fetchAll(PDO::FETCH_ASSOC);

                var_dump($requestG[$i]['requestg_id']);

                echo "<div class='admin'>";
                echo "<form action='insertGame.php' method='post'>";
                echo "<strong>".$name[0]['username']."</strong><br><hr>";
                echo "<input type='hidden' value='".$requestG[$i]['requestG_id']."'>";
                echo "<input type='hidden' value='".$requestG[$i]['member_id']."'>";
                echo "<p>Title</p>";
                echo "<input type='text' value='".$requestG[$i]['title']."'>"; 
                echo "<p>Estimated Time (Minutes)</p>";
                echo "<input type='text' value='".$requestG[$i]['time_length_min']."'>";
                echo "<p>Complexity</p>"; 
                echo "<input type='text' value='".$requestG[$i]['complexity']."'>";
                echo "<p>Number of Maximum Players</p>";
                echo "<input type='text' value='".$requestG[$i]['num_players']."'>"; 

                $query = 'SELECT pub_name FROM game.requestP p LEFT JOIN game.requestBG bg ON p.requestP_id = bg.requestP_id WHERE requestG_id = :rg_id';
                $stmt = $db->prepare($query);
                $stmt -> bindValue(':rg_id', $requestG[$i]['requestg_id'], PDO::PARAM_INT);
                $stmt -> execute();
                $requestP = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                

                for ($x=0; $x < count($requestP); $x++) {
                    $newx = $x +1;
                    echo "<p>Publisher ".$newx."</p>"; 
                    echo "<input type='hidden' value='".$requestP[$i]['requestp_id']."'>";
                    echo "<input type='hidden' value='".$requestP[$i]['member_id']."'>";
                    echo "<input type='text' name='pub".$x."' id='pub".$newx."' value='".$requestP[0]['pub_name']."'>";
                }

                echo "<p>Description</p>";
                echo "<textarea>".$requestG[$i]['descript']."</textarea><br>"; 
                echo "<input type='submit' class='confirm' value='Confirm'>";
                echo "</form>";
                echo "<form action='deleteRequest' method='post'>";
                echo "<input type='hidden' value='".$requestG[$i]['requestg_id']."'>";
                echo "<input type='hidden' value='".$requestG[$i]['member_id']."'>";
                for ($x=0; $x < count($requestP); $x++) {
                    echo "<input type='hidden' value='".$requestP[$i]['requestp_id']."'>";
                    echo "<input type='hidden' value='".$requestP[$i]['member_id']."'>";
                }
                echo "<input type='submit' class='delete' value='Delete'>";
                echo "</form>";
                echo "</div>";
            }
            echo "</div>";
        ?>
    </div>
</body>
</html>