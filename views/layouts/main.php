<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" rel="stylesheet">
    <title>Pop it MVC</title>
</head>
<body>
<header>
    <nav>
        <?php
        if (app()->auth::check()):
        if (app()->auth::user()->job_title_id <= 3){
            ?>
            <a href='<?= app()->route->getUrl('/receptions') ?>'>Записи</a>
            <a href='<?= app()->route->getUrl('/patients') ?>'>Пациенты</a>
        <?php } //https://laravel.com/docs/10.x/eloquent-relationships
        if (app()->auth::user()->job_title_id <= 2) {?>
            <a href='<?= app()->route->getUrl('/diagnosis') ?>'>Диагнозы</a>
            <?php if (app()->auth::user()->job_title_id === 1){ ?>
                <a href='<?= app()->route->getUrl('/cabinets') ?>'>Кабинеты</a>
                <a href='<?= app()->route->getUrl('/employees') ?>'>Сотрудники</a>
            <?php }

        } ?>
    </nav>
    <div class="logout">
        <p><?= app()->auth::user()->name ?></p>
        <button><a href="<?= app()->route->getUrl('/logout') ?>">ВЫХОД</a></button>
    </div>
    <?php endif; ?>
</header>
<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>