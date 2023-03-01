<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Простейший PHP-cкpиnт</title>
    <meta charset='utf-8'>
</head>
<body>
<?php
if(!empty($_POST)){
    file_put_contents("content.txt", $_POST['text']);
}

?>
    <form method="post">
        <label>
            Введите текст:<br>
            <textarea name='text'><?php echo file_get_contents('content.txt'); ?></textarea>
        </label>
        <br>
        <input type="submit">
    </form>
</body>
</html>