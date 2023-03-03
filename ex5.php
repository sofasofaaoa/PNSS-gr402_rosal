<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Простейший PHP-cкpиnт</title>
    <meta charset='utf-8'>
</head>
<body>
    <?php
        $browser = $_SERVER['HTTP_USER_AGENT'];
        echo $browser;
    ?>
</body>
</html>

