<!DOCTYPE html>
<html lang='ru'>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Museum</title>
    </head>
    <body>
        <?php
        session_start();
        if (empty($_SESSION['id']))
        {
            echo "Вы вошли на сайт, как гость<br>";
            ?>
            <form action="/auth/testlogin.php" method="post">
                <p>
                    <label>Ваш login:<br>
                    <input name="login" type="text"></label>
                </p>
                <p>
                    <label>Ваш пароль:<br>
                    <input name="password" type="password"></label>
                </p>
                <p>
                    <input type="submit" name="submit" value="Войти">
                    <br>
                </p>
            </form>
            <br>
        <?php
        
        }else{
            require_once 'db.php';
            $db = mysqli_connect("localhost","root", "QWEasd123", "gr402_rosal");
            mysqli_set_charset($db, "utf8mb4");
            function con($query, $db){
                $res = mysqli_query($db, $query);
                if (!$res) die (mysqli_error($db));
                return $res;
            }
            echo "Вы вошли на сайт, как ".$_SESSION['login'];
            ?> 
            <br>
            <a href='auth/logout.php'>Выйти</a> 
            <br>
            <a href='add.php'>ADD</a><br><?php
             if (!empty($_GET['del']) && !empty((int)$_GET['id'])) {
                 $id = (int)$_GET['id'];
                 $query = "DELETE FROM `exhibits` WHERE id=$id";
                 $res = con($query, $db);
                 if (mysqli_affected_rows($db) == 1) {
                     echo "<h2>Экспонат удален</h2>";
                 }
             }

            $query = "SELECT * FROM `exhibits`";
            $res = con($query, $db);
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <div class="about">
                    <h2><?= $row['name']; ?> </h2>
                    <p><?= $row['description']; ?></p><br>
                </div>
                <div class="del_exh">
                <a href="?del=ok&id=<?=$row['id']; ?>" ><b>+</b></a>
                </div>
        <?php
        }
        ?>
            <?php
        }
        ?>
        <?php
        
        
        ?>
    </body>
</html>