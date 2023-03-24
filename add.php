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
    require_once 'db.php';
    function con($query, $db){
        $res = mysqli_query($db, $query);
        if (!$res) die (mysqli_error($db));
        return $res;
    }
    if (!empty($_POST['submit'])) {
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);
        $query = "INSERT INTO exhibits (name, description) VALUES ('$name', '$description')";
        $res = con($query, $db);
        if (mysqli_affected_rows($db) == 1) {
            echo "<h2>Экспонат добавлен</h2>";
        }
     }
    ?>
    <form action="" method="post" class='form'>
       <label>Name: <input type="text" name="name"></label>
       <label>Description: <input type="text" name="descr"></label>
       <input type="submit" name="submit" value="ADD">
   </form>
</body>
</html>