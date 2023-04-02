<div class="h1">
    <h1>ДОБАВЛЕНИЕ ПАЦИЕНТА</h1>
</div>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <div class="form_col">
        <label>Фамилия <br><input type="text" name="surname"></label>
        <label>Имя <br><input type="text" name="name"></label>
        <label>Отчество <br><input type="text" name="patronymic"></label>

        <div class="form_row">
            <label>Дата рождения <br><input type="date" name="date_of_birth"></label>
        </div>
        <button>ДОБАВИТЬ</button>
    </div>
</form>
