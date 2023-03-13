<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Простейший PHP-cкpиnт</title>
    <meta charset='utf-8'>
</head>
<body>
<?php
if (isset($_POST['submit'])) {
   if (empty($_POST['email'])) {
       $errEmail = 'Обязательное поле';
   } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
       $errEmail = 'Некорректный формат почты';
   } else {
       $email = $_POST['email'];
   }
   if (empty($_POST['name'])) {
       $errName = 'Обязательное поле';  
   } else if (!preg_match("/[а-яА-Я]/", $_POST['name'])) {
    $errName = 'Имя должно содержать кириллицу';
    }else if (strlen($_POST['name']) < 4) {
       $errName = 'Длина имени должна быть больше 2';
   } else if (strlen($_POST['name']) > 40) {
       $errName = 'Длина имени должна быть меньше 20';
   } else {
       $name = $_POST['name'];
   }
   if (empty($_POST['surname'])) {
       $errSurName = 'Обязательное поле';
   }else if (!preg_match("/[а-яА-Я]/", $_POST['surname'])) {
    $errSurName = 'Фамилия должна содержать кириллицу';
   } else if (strlen($_POST['surname']) < 4) {
       $errSurName = 'Длина фамилии должна быть больше 2';
   } else if (strlen($_POST['surname']) > 40) {
       $errSurName = 'Длина фамилии должна быть меньше 20';
   } else {
       $SurName = $_POST['surname'];
   }
   if (!empty($name) && !empty($SurName) && !empty($email)) {
       $text = file('users.txt');
       foreach ($text as $string) {
           if (str_contains($string, $_POST['name']) && str_contains($string, $_POST['surname']) || str_contains($string, $_POST['email'])) {
               $uniqueErr = 'Такой пользователь уже существует';
           }
       }
       if (empty($uniqueErr)) {
           $user = $name . ' ' . $SurName . ' - ' . $email . "\n";
           file_put_contents('users.txt', $user, FILE_APPEND);
       }
   }
}
?>
<form action="" class="form1" method="POST">
   <?php
   if (!empty($errEmail))
       echo "<p><font color='red'>$errEmail</font></p>"
   ?>
   <input class="inp" type="text" name="email" placeholder="Email">
   <br><br>
   <?php
   if (!empty($errName))
       echo "<p><font color='red'>$errName</font></p>"
   ?>
   <input class="inp" type="text" name="name" placeholder="Name">
   <br><br>
   <?php
   if (!empty($errSurName))
       echo "<p><font color='red'>$errSurName</font></p>"
   ?>
   <input class="inp" type="text" name="surname" placeholder="Surname">
   <br><br>
   <?php
   if (!empty($uniqueErr))
       echo "<p><font color='red'>$uniqueErr</font></p>"
   ?>
   <button name="submit">Отправить</button>
</form>
</body>
</html>

