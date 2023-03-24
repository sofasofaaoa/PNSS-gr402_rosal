<?php
    session_start();
    $errors = [];
    if (isset($_POST['login'])) { $login = $_POST['login']; if (empty($login)) { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if (empty($password)) { unset($password);} }
    if (empty($login) or empty($password)) 
    {
        $errors[] = "Вы ввели не всю информацию, вернитесь назад и заполните все поля!";
    }
    include ("../db.php");
    $result = mysqli_query($db, "SELECT * FROM users WHERE login='$login'"); 
    print_r( $result);
    $myrow = mysqli_fetch_array($result);
    var_dump( $myrow);
    if (empty($myrow['password']))
    {
        $errors[] = "Извините, идите в пень.";
    }
    else {
        if ($myrow['password']==$password) {
            $_SESSION['login']=$myrow['login']; 
            $_SESSION['id']=$myrow['id'];
        } else {
            $errors[] = "Извините, идите лесом.";
        }
    }

    
    header('Location: ../index.php')
?>