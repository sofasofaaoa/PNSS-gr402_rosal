<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Простейший PHP-cкpиnт</title>
    <meta charset='utf-8'>
</head>
<body>
<?php
    $text = '<p><div><title>PHP: Hypertext Preprocessor</title>привент</div><p>';
    preg_match('/<title[^>]*?>(.*?)<\/title>/si', $text, $pregs);
    echo $pregs[1];
    // echo $text;
?>
</body>
</html>

