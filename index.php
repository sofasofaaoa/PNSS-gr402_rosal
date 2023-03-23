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
        }else{
            echo "Вы вошли на сайт, как ".$_SESSION['name'].$_SESSION['surname']."";
            ?> 
            <br>
            <a href='auth/logout.php'>Выйти</a>
            <?php
        }
        ?>
        <?php
        require_once 'db.php';
        function con($query, $db){
            $res = mysqli_query($db, $query);
            if (!$res) die (mysqli_error($db));
            return $res;
        }
        if (!empty($_GET['del']) && !empty((int)$_GET['id'])) {
        $id = (int)$_GET['id'];
        $query = "DELETE FROM classics WHERE id=$id";
        $res = con($query, $db);
        if (mysqli_affected_rows($db) == 1) {
            echo "<h2>Экспонат удален</h2>";
        }
        }
        if (!empty($_SESSION['login']) && !empty($_SESSION['id']))
        {echo "<a href='classics_add.php'>ADD</a>";}
        $query = 'SELECT * FROM classics';
        $res = con($query, $db);
        while ($row = mysqli_fetch_assoc($res)) {
        ?>
        <div class='roww'>
                <div class="about">
                    <h2><?= $row['title']; ?> </h2>
                    <p><?= $row['author']; ?></p><br>
                    <p>Category: <?= $row['type']; ?></p><br>
                    <p>Year: <?= $row['year']; ?></p><br>
                </div>
                <?php if (!empty($_SESSION['login']) && !empty($_SESSION['id'])){
                    echo 
                    "<form action='' method='post' class='form'>
                    <label style='display: none'>ID <input readonly type='text' name='id' value='", $row['id'], "'></label>
                    <label>Author <input type='text' name='author' value='", $row['author'], "'></label>
                    <label>Title <input type='text' name='title' value='", $row['title'], "'></label>
                    <label>Category <input type='text' name='type' value='", $row['type'], "'></label>
                    <label>Year <input type='text' name='year' value='", $row['year'], "'></label>
                    <input type='submit' name='submit' value='EDIT'>
                </form>
                <a href='?del=ok&id=", $row['id'], "'><b>+</b></a>";
                }?>
                
        </div>
        <?php
        }
        ?>
    </body>
</html>