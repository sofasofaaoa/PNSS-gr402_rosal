<div class="h1"><h1>Авторизация</h1>
    <h3><?= $message ?? ''; ?></h3></div>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>

    <form method="post">
        <div class="form_col">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label>Логин <br><input type="text" name="login"></label>
            <label>Пароль <br><input type="password" name="password"></label>
            <button>Войти</button>
        </div>
    </form>
<?php endif;
