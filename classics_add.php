<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once 'dbconnect.php';
    if (!empty($_POST['submit']) && $_POST['submit'] == 'ADD') {
        $author = strip_tags($_POST['author']);
        $title = strip_tags($_POST['title']);
        $type = strip_tags($_POST['type']);
        $year = strip_tags($_POST['year']);
        $query = "INSERT INTO classics (author, title, type, year) VALUES ('$author', '$title', '$type', '$year')";
        $res = con($query, $mysqli);
        if (mysqli_affected_rows($mysqli) == 1) {
            echo "<h2>Запись добавлена</h2>";
        }
     }
    ?>
    <form action="" method="post" class='form'>
       <label>Author <input type="text" name="author"></label>
       <label>Title <input type="text" name="title"></label>
       <label>Category <input type="text" name="type"></label>
       <label>Year <input type="text" name="year"></label>
       <input type="submit" name="submit" value="ADD">
   </form>
</body>
</html>