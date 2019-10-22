<?php 
require_once("scrDb.php");
$db = get_db();

$book = $_POST['book'];
$chapter = $_POST['chapter'];
$verse = $_POST['verse']; 
$content = $_POST['content'];

if (isset($book)) {
    $query = 'INSERT INTO scr.scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)';
    $stmt = $db -> prepare($query);
    $stmt->bindValue(':book', $book, PDO::PARAM_STR);
    $stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);  
    $stmt->bindValue(':verse', $verse, PDO::PARAM_INT);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);  
    $result = $stmt->execute(); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scriptures</title>
</head>
<body>
    <div>
        <form action="insert.php" method="post">
            <input type="text" name="book" placeholder="Book"><br>
            <input type="text" name="chapter" placeholder="chapter"><br>
            <input type="text" name="verse" placeholder="verse"><br>
            <textarea name="content" cols="30" rows="10"></textarea>
            <?php 
                echo "<br>";
                foreach ($db->query('SELECT topic FROM scr.topics') as $topic) {
                    echo "<input type='checkbox' name='topic' value='" . $topic['topic'] . "'>" . $topic['topic'];
                }
            ?>    
            <input type="submit" value="Go Go"> 
        </form>
    </div>
</body>
</html>