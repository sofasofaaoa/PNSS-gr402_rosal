<?php
    session_start();
    $errors = [];
    if (isset($_POST['surname'])) { $login = $_POST['surname']; if ($login == '') { unset($surname);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if (empty($surname) or empty($password)) 
    {
        $errors[] = "Вы ввели не всю информацию, вернитесь назад и заполните все поля!";
    }
    include ("../db.php");
    $result = mysqli_query($db, "SELECT * FROM users WHERE surname='$surname'"); 
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