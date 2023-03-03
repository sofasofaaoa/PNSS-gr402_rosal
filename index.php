<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Простейший PHP-cкpиnт</title>
    <meta charset='utf-8'>
</head>
<body>
    <?php
        $html = file_get_contents("http://php.net");
        echo preg_match("\<title>", $html);
        echo 'hi';
    ?>
</body>
</html>

