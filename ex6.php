<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Простейший PHP-cкpиnт</title>
    <meta charset='utf-8'>
</head>
<body>
    <?php
        if ( stristr($_SERVER['HTTP_USER_AGENT'], 'Chrome') ) echo 'chrome';
        elseif ( stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE') ) exit();
    ?>
</body>
</html>

