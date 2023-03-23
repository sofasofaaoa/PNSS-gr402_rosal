<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <title>Museum</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        if (empty($_SESSION['id']))
        {
            echo "Вы вошли на сайт, как гость<br>";
            ?>
            <form action="/auth/testlogin.php" method="post">
                <p>
                    <label>Ваша фамилия:<br></label>
                    <input name="surname" type="text" maxlength="50">
                </p>
                <p>
                    <label>Ваш пароль:<br></label>
                    <input name="password" type="password" maxlength="20">
                </p>
                <p>
                    <input type="submit" name="submit" value="Войти">
                    <br>
                </p>
            </form>
            <br>
        <?php
        require_once 'auth/testlogin.php';
        require_once 'db.php';
            for ($i = 0; $i <= count($errors); $i++){
                echo "<p>$errors[$i]</p>";
            }
        }else{
            echo "Вы вошли на сайт, как ".$_SESSION['name'].$_SESSION['surname']."";
            ?> 
            <br>
            <a href='auth/logout.php'>Выйти</a> 
            <br>
            <a href='add.php'>ADD</a><br><?php

            function con($query, $db){
                $res = mysqli_query($db, $query);
                if (!$res) die (mysqli_error($db));
                return $res;
            }
            $query = 'SELECT * FROM classics';
            $res = con($query, $db);
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <div class='roww'>
                <div class="about">
                    <h2><?= $row['name']; ?> </h2>
                    <p><?= $row['description']; ?></p><br>
                </div>
                <a href="?del=ok&id=<?=$row['id']; ?>"><b>+</b></a>
            </div>
        <?php
        }
        ?>
            <?php
        }
        ?>
        <?php
        
        if (!empty($_GET['del']) && !empty((int)$_GET['id'])) {
            $id = (int)$_GET['id'];
            $query = "DELETE FROM exhibits WHERE id=$id";
            $res = con($query, $db);
            if (mysqli_affected_rows($db) == 1) {
                echo "<h2>Экспонат удален</h2>";
            }
        }
        ?>
    </body>
</html>