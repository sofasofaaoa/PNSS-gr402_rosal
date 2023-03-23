<?php
    session_start();
    $errors = [];
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if (empty($login) or empty($password)) 
    {
        $errors[] = "Вы ввели не всю информацию, вернитесь назад и заполните все поля!";
    }
    include ("../bd.php");
    $result = mysqli_query($db, "SELECT * FROM users WHERE login='$login'"); 
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password']))
    {
        $errors[] = "Извините, введённый вами login или пароль неверный.";
    }
    else {
        if ($myrow['password']==$password) {
            $_SESSION['name']=$myrow['name'];
            $_SESSION['surname']=$myrow['surname']; 
            $_SESSION['id']=$myrow['id'];
        } else {
            $errors[] = "Извините, введённый вами login или пароль неверный.";
        }
    }
    header('Location: ../index.php');
?>