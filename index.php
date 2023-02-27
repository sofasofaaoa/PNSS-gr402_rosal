<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Простейший PHP-cкpиnт</title>
    <meta charset='utf-8'>
</head>
<body>
<?php
echo "Задание для выполнения №1<br>";
echo date("d.m.Y H:i");
echo "<br>Задание для выполнения №2<br>";
echo mt_rand(0, 1000);
echo "<br>Задание для выполнения №3<br>";
echo round(42.43752, 2);
echo "<br>Задание для выполнения №4<br>";
echo decbin(4252);
echo "<br>".decbin(89090);
echo "<br>Задание для выполнения №5<br>";
file_put_contents('hello.txt', "Hello, world!");
echo file_get_contents('hello.txt');
echo "<br>Задание для выполнения №6<br>";
$date = date('Y-m-d-h-i-s');
file_put_contents("$date.txt", mt_rand(0, PHP_INT_MAX));
echo "<br>Задание для выполнения №13<br>";
$a = 1;
$b = 3;
$a+=+$b-$b=$a;
echo "$a, $b";
echo "<br>Задание для выполнения №14<br>";
$a = [];
for ($i = 0; $i <= (mt_rand(5, 10)); $i++){
    $a[$i] = mt_rand(0, 100);
}
var_dump($a);
sort($a);
echo "<br>";
var_dump($a);
echo "<br>Задание для выполнения №15<br>";
var_dump(file("months.txt"));
echo "<br>Задание для выполнения №16<br>";
function odd($num){
    if ($num % 2 == 0){
        echo 'true';
    } else {
        echo 'false';
    }
}
odd(3);
echo "<br><br><br>Индивидуальное задание";
$X = [11, -22, 32, 55, -12, 66, 75, -99, -11, 77];
$Z = [];
for ($i = 0; $i <= (count($X) - 1); $i++)
{
    $number = str_split($X[$i]);
    if ($X[$i] > 0 & $number[0] == $number[1])
        $Z[] = $X[$i];
}
var_dump($Z);
foreach($Z as $key => $item)
{
    $number = str_split($item);
    if (($number[0] + $number[1]) % 2 == 0)
        unset($Z[$key]);
}
var_dump($Z)
?>
</body>
</html>

