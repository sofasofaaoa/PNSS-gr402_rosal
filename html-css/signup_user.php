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
    <h1>ДОБАВЛЕНИЕ СОТРУДНИКА</h1>
</div>
<form method="post">
    <div class="form_col">

        <label>Логин <br><input type="text" name="login"></label>
        <label>Пароль <br><input type="password" name="password"></label>
        <label>Фамилия <br><input type="text" name="surname"></label>
        <label>Имя <br><input type="text" name="name"></label>
        <label>Отчество <br><input type="text" name="patronymic"></label>
    </div>
    <div class="form_col">
        <div class="form_row">
            <label>Пол<br>
                <select name="sex">
                    <option value="М">М</option>
                    <option value="Ж">Ж</option>
                </select>
            </label>
            <label>Дата рождения <br><input type="date" name="date_of_birth"></label>
        </div>
        <label>Должность<br>
            <select name="job_title_id">
                <option value="1">Администратор</option>
                <option value="2">Регистратура</option>
                <option value="3">Врач</option>
            </select>
        </label>
        <label>Специализация<br> <input type="text" name="specialization"></label>
        <button>ДОБАВИТЬ</button>
    </div>

</form>
