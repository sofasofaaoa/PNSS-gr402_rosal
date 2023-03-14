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
$post = $_POST;
$get = $_GET;
function add($post) {
    echo 1234;
    $author = strip_tags($post['author']);
    $title = strip_tags($post['title']);
    $type = strip_tags($post['type']);
    $year = strip_tags($post['year']);
    $query = "INSERT INTO classics (author, title, type, year) VALUES ('$author', '$title', '$type', '$year')";
    $res = mysqli_query($mysqli, $query);
    if (!$res) die (mysqli_error($mysqli));
    // Если количество затронутых запростом записей равно 1 (одна запись добавлена)
    // то выводим сообщение
    if (mysqli_affected_rows($mysqli) == 1) {
        echo "<h2>Запись добавлена</h2>";
    }
}
function del($get) {
    echo 134;
    $id = (int)$get['id'];
    $query = "DELETE FROM classics WHERE id=$id";
    $res = mysqli_query($mysqli, $query);
    if (!$res) die (mysqli_error($mysqli));
    if (mysqli_affected_rows($mysqli) == 1) {
        echo "<h2>Запись с id = $id удалена</h2>";
    }
}
?>
<form action="" method="post">
       <label>Author <input type="text" name="author"></label>
       <label>Title <input type="text" name="title"></label>
       <label>Category <input type="text" name="type"></label>
       <label>Year <input type="text" name="year"></label>
       <input type="submit" name="submit" value="ADD">
</form>
<?php
$query = "SELECT * FROM classics";
$res = mysqli_query($mysqli, $query);
if (!$res) die (mysqli_error($mysqli));
while ($row = mysqli_fetch_assoc($res)) {
   ?>
   
   <p>
   <h2><?= $row['title']; ?> <a href="?del=ok&id=<?= $row['id']; ?>">уд.</a></h2>
   <?= $row['author']; ?><br>
   Category: <?= $row['type']; ?><br>
   Year: <?= $row['year']; ?><br>
   </p>
   <?php
}
if (!empty($_GET['del']) && !empty((int)$_GET['id'])) del($get);
if (!empty($_POST['submit']) && $_POST['submit'] == 'ADD') add($post);
?>
</body>
</html>