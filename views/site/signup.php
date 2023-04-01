<h2>ДОБАВЛЕНИЕ СОТРУДНИКА</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post" style="">
    <label>Логин <input type="text" name="login"></label>
    <label>Пароль <input type="password" name="password"></label>
    <label>Фамилия <input type="text" name="surname"></label>
    <label>Имя <input type="text" name="name"></label>
    <label>Отчество <input type="text" name="patronymic"></label>
    <label>Пол
        <select name="sex">
            <option value="М">М</option>
            <option value="Ж">Ж</option>
        </select>
    </label>
    <label>Дата рождения <input type="date" name="date_of_birth"></label>
    <label>Должность
        <select name="job_title_id">
            <option value="1">Администратор</option>
            <option value="2">Регистратура</option>
            <option value="3">Врач</option>
        </select>
    </label>
    <label>Специализация <input type="text" name="specialization"></label>

    <button style="width: 200px">Зарегистрироваться</button>
</form>
