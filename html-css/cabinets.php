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
    <h1>КАБИНЕТЫ</h1><div class="new"><button><a href="<?= app()->route->getUrl('/newcab') ?>">ДОБАВИТЬ</a></button> <input type="text" name="title"></div>
</div>
<div class="table">
    <table>
        <thead>
        <tr>
            <th>Номер</th>
            <th>Название</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Номер</td>
            <td>Название</td>
            <td><a href="#">X</a></td>
        </tr>
        <tr>
            <td>Номер</td>
            <td>Название</td>
            <td><a href="#">X</a></td>
        </tr>
        <tr>
            <td>Номер</td>
            <td>Название</td>
            <td><a href="#">X</a></td>
        </tr>
        <tr>
            <td>Номер</td>
            <td>Название</td>
            <td><a href="#">X</a></td>
        </tr>
        <tr>
            <td>Номер</td>
            <td>Название</td>
            <td><a href="#">X</a></td>
        </tr>
        <tr>
            <td>Номер</td>
            <td>Название</td>
            <td><a href="#">X</a></td>
        </tr>
        <tr>
            <td>Номер</td>
            <td>Название</td>
            <td><a href="#">X</a></td>
        </tr>
        <tr>
            <td>Номер</td>
            <td>Название</td>
            <td><a href="#">X</a></td>
        </tr>
        <tr>
            <td>Номер</td>
            <td>Название</td>
            <td><a href="#">X</a></td>
        </tr>
        <tr>
            <td>Номер</td>
            <td>Название</td>
            <td><a href="#">X</a></td>
        </tr>
        <tr>
            <td>Номер</td>
            <td>Название</td>
            <td><a href="#">X</a></td>
        </tr>
        <tr>
            <td>Номер</td>
            <td>Название</td>
            <td><a href="#">X</a></td>
        </tr>

        </tbody>
    </table>
</div>
</body>
</html>