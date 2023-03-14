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
$query = "SELECT * FROM classics";
$res = mysqli_query($mysqli, $query);
if (!$res) die (mysqli_error($mysqli));
while ($row = mysqli_fetch_assoc($res)) {
   ?>
   <p>
       <h2><?= $row['title']; ?></h2>
       <?= $row['author']; ?><br>
       Category: <?= $row['type']; ?><br>
       Year: <?= $row['year']; ?><br>
   </p>
   <?php
}
?>
</body>
</html>