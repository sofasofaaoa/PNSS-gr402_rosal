<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet">
    <title>Pop it MVC</title>
</head>
<body>
<header>
    <nav>
        <a href='#'>Записи</a>
        <a href='#'>Пациенты</a>
        <a href='#'>Диагнозы</a>
        <a href='#'>Кабинеты</a>
        <a href='#'>Сотрудники</a>
    </nav>
    <div class="logout">
        <p>USER</p>
        <button><a href="#">ВЫХОД</a></button>
    </div>
</header>
<div class="h1">
    <h1>ПРИЁМ</h1>
</div>
<form method="post">
    <div class="form_col">
        <label>Пациент<br> <input readonly type="text" name="patient"></label>
        <label>Врач<br> <input readonly type="text" name="user"></label>
        <label>Кабинет<br> <input readonly type="text" name="cabinet"></label>
    </div>
    <div class="form_col">
        <div class="form_row">
            <label>Дата <br><input readonly type="date" name="date"></label>
            <label>Время <br><input readonly type="time" name="time"></label>
        </div>
        <label>Диагноз<br> <input type="text" name="diagnosis"></label>
        <button>СОХРАНИТЬ</button>
    </div>

</form>
<?php
