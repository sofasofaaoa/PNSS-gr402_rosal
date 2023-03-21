<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php
require_once 'dbconnect.php';
function con($query, $mysqli){
    $res = mysqli_query($mysqli, $query);
    if (!$res) die (mysqli_error($mysqli));
    return $res;
}
if (!empty($_GET['del']) && !empty((int)$_GET['id'])) {
   $id = (int)$_GET['id'];
   $query = "DELETE FROM classics WHERE id=$id";
   $res = con($query, $mysqli);
   if (mysqli_affected_rows($mysqli) == 1) {
       echo "<h2>Запись с id = $id удалена</h2>";
   }
}
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
if (!empty($_POST['submit']) && $_POST['submit'] == 'EDIT') {
    $id = strip_tags($_POST['id']);
    $author = strip_tags($_POST['author']);
    $title = strip_tags($_POST['title']);
    $type = strip_tags($_POST['type']);
    $year = strip_tags($_POST['year']);
    $query = "UPDATE classics SET `title` = '$title', `author` = '$author', `type` = '$type', `year` = '$year' WHERE `id` = '$id'";
    con($query, $mysqli);
    if (mysqli_affected_rows($mysqli) == 1) {
        echo "<h2>Запись изменена</h2>";
    }
 }
?>
   <a href="classics_add.php">ADD</a>
<?php
$query = 'SELECT * FROM classics';
$res = con($query, $mysqli);
while ($row = mysqli_fetch_assoc($res)) {
   ?>
   <div class='roww'>
        <p>
            <h2><?= $row['title']; ?> <a href="?del=ok&id=<?= $row['id']; ?>">уд.</a></h2>
            <?= $row['author']; ?><br>
            Category: <?= $row['type']; ?><br>
            Year: <?= $row['year']; ?><br>
        </p>
        <form action="" method="post" class='form'>
            <label style="display: none">ID <input readonly type="text" name="id" value="<?= $row['id']; ?>"></label>
            <label>Author <input type="text" name="author" value="<?= $row['author']; ?>"></label>
            <label>Title <input type="text" name="title" value="<?= $row['title']; ?>"></label>
            <label>Category <input type="text" name="type" value="<?= $row['type']; ?>"></label>
            <label>Year <input type="text" name="year" value="<?= $row['year']; ?>"></label>
            <input type="submit" name="submit" value="EDIT">
        </form>
   </div>
   <?php
}
?>
</body>
</html>