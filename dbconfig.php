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
$host = 'localhost';
$database = 'classics';
$user = 'root';
$password = '';
$mysqli = mysqli_connect($host, $user, $password, $database);
if (!$mysqli) {
   echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
}
?>
</body>
</html>