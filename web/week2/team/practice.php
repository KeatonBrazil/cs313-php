<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        for ($i = 0; $i < 10; $i++) {
            if ($i%2===0) {
                echo "<div id=$i style="color:blue">I am Blue and div $i</div>";

            } else 
                echo "<div id=$i style="color:red">I am Red and div $i</div>";
        };
    ?>
</body>
</html>