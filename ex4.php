<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Простейший PHP-cкpиnт</title>
    <meta charset='utf-8'>
</head>
<body>
    <?php
    $time = (int) date('H');
    if(!empty($_POST)){
        if(5 < $time & $time < 11){
            echo "Доброе утро, ", $_POST['name'], " ", $_POST['surname'], "!";
        } elseif(11 < $time & $time < 16){
            echo "Добрый день, ", $_POST['name'], " ", $_POST['surname'], "!";
        } elseif(16 < $time & $time < 0){
            echo "Добрый вечер, ", $_POST['name'], " ", $_POST['surname'], "!";
        } else{
            echo "Доброй ночи, ", $_POST['name'], " ", $_POST['surname'], "!";
        }
    }
    ?>
    <form method="post">
        <label>Surname:<br><input type='text' name='surname' placeholder='Ivanov'></label>
        <br>
        <label>Name:<br><input type='text' name='name' placeholder='Ivan'></label>
        <br>
        <input type="submit">
    </form>
</body>
</html>

