<?php
$host = 'localhost';
$database = 'gr402_rosal';
$user = 'root';
$password = 'QWEasd123';
$mysqli = mysqli_connect($host, $user, $password, $database);
if (!$mysqli) {
   echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
}