<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Простейший PHP-cкpиnт</title>
    <meta charset='utf-8'>
</head>
<body>
    <?php
    $a = file('list.txt');
    $b = [];
    if(!empty($_POST)){
        
        foreach($_POST as $key => $value){
            $b[] = $key;
        }
        var_dump($a);
        var_dump($b);
        var_dump(array_diff($a, $b));
        file_put_contents('list.txt', implode("", array_diff($a, $b)));
    }
    ?>
    <form method="post">
        <?php 
        foreach($a as $value){
            echo "<label><input type='checkbox' name='$value'>$value</label><br>";
        } 
        ?>
        <br>
        <input type="submit">
    </form>
</body>
</html>
