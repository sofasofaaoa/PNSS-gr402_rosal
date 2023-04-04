<div class="h1">
    <h1>ДОБАВЛЕНИЕ СОТРУДНИКА</h1>
</div>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <div class="form_col">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
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
                <option value="2">Врач</option>
                <option value="3">Регистратура</option>
            </select>
        </label>
        <label>Специализация<br> <input type="text" name="specialization"></label>
        <button>ДОБАВИТЬ</button>
    </div>

</form>