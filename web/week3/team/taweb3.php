<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="ta3.php" method="post">
        <input type="text" name="name" placeholder="Enter Name" id=""><br>
        <input type="text" name="email" placeholder="Enter Email" id=""><br>
        Major: <br>
        <?php 
        $array = array("Computer Science", "Web Design and Development", 
        "Computer Information Technology", "Computer Engineering");
        $count = count($array);
        for ($x = 0; $x < $count; $x++) {
            echo " <input type='radio' name='major' value='$array[$x]'> $array[$x] <br>";
        }
        ?>
        Comments: <br>
        <textarea name="comments" id="" cols="30" rows="10"></textarea><br>
        <input type="checkbox" name="continent[]" id="" value="na">North America<br>
        <input type="checkbox" name="continent[]" id="" value="sa">South America<br>
        <input type="checkbox" name="continent[]" id="" value="eu">Europe<br>
        <input type="checkbox" name="continent[]" id="" value="as">Asia<br>
        <input type="checkbox" name="continent[]" id="" value="aus">Australia<br>
        <input type="checkbox" name="continent[]" id="" value="af">Africa<br>
        <input type="checkbox" name="continent[]" id="" value="an">Antarctica<br>

        <input type="submit" value="Submit">
        
    </form>
</body>
</html>