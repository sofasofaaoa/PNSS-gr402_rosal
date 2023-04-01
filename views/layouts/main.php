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
                <a href='<?= app()->route->getUrl('/hello') ?>'>Записи</a>
                <a href='<?= app()->route->getUrl('/hello') ?>'>Пациенты</a>
                <?php } //https://laravel.com/docs/10.x/eloquent-relationships
                if (app()->auth::user()->job_title_id <= 2) {?>
                    <a href='<?= app()->route->getUrl('/hello') ?>'>Диагнозы</a>
                    <?php if (app()->auth::user()->job_title_id === 1){ ?>
                            <a href='<?= app()->route->getUrl('/hello') ?>'>Кабинеты</a>
                            <a href='<?= app()->route->getUrl('/hello') ?>'>Сотрудники</a>
                    <?php }

            } ?>
        <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->name ?>)</a>
        <?php endif; ?>
    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>