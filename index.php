<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="UTF-8">
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
                    <label>Ваш login:<br></label>
                    <input name="login" type="text">
                </p>
                <p>
                    <label>Ваш пароль:<br></label>
                    <input name="password" type="password">
                </p>
                <p>
                    <input type="submit" name="submit" value="Войти">
                    <br>
                </p>
            </form>
            <br>
        <?php
        require_once 'db.php';
        require_once '/auth/testlogin.php';
        for ($i = 0; $i <= count($errors); $i++){
            echo "<p>$errors[$i]</p>";
        }
        }else{
            echo "Вы вошли на сайт, как ".$_SESSION['login']."";
            ?> 
            <br>
            <a href='auth/logout.php'>Выйти</a> 
            <br>
            <a href='add.php'>ADD</a><br><?php
            if (!empty($_GET['del']) && !empty((int)$_GET['id'])) {
                $id = (int)$_GET['id'];
                $query = "DELETE FROM exhibits WHERE id=$id";
                $res = con($query, $db);
                if (mysqli_affected_rows($db) == 1) {
                    echo "<h2>Экспонат удален</h2>";
                }
            }
            function con($query, $db){
                $res = mysqli_query($db, $query);
                if (!$res) die (mysqli_error($db));
                return $res;
            }
            $query = "SELECT * FROM exhibits";
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
        
        
        ?>
    </body>
</html>