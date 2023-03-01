<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Простейший PHP-cкpиnт</title>
    <meta charset='utf-8'>
</head>
<body>
<?php
if(!empty($_POST)){
    $ax = (int) $_POST['ax'];
    $bx = (int) $_POST['bx'];
    $ay = (int) $_POST['ay'];
    $by = (int) $_POST['by'];
    $ab = sqrt(($bx - $ax)**2 + ($by - $ay)**2);
    echo "<p>$ab</p>";
}

?>
    <form method="post">
        <label>
            AX:
            <input type="text" name="ax">
        </label>
        <br>
        <label>
            BX:
            <input type="text" name="bx">
        </label>
        <br>
        <label>
            AY:
            <input type="text" name="ay">
        </label>
        <br>
        <label>
            BY:
            <input type="text" name="by">
        </label>
        <br>
        <input type="submit">
    </form>
</body>
</html>