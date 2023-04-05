<div class="h1">
    <h1>ЗАПИСЬ НА ПРИЁМ</h1>
</div>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <div class="form_col">
        <label>Пациент<br>
            <select name="patient_id">
                <option>Выберите пациента</option>
                <?php foreach ($patients as $patient){
                    echo '<option value="' .$patient->patient_id. '">' . $patient->surname . ' '
                        . mb_substr($patient->name, 0, 1, 'UTF-8') . '. '
                        . mb_substr($patient->patronymic, 0, 1, 'UTF-8') . '.';
                }
                ?>
            </select>
        </label>
        <label>Врач<br>
            <select name="id">
                <option>Выберите врача</option>
                <?php foreach ($users as $user){
                    if ($user->job_title_id === 2)
                    echo '<option value="' .$user->id. '">' . $user->surname . ' '
                        . mb_substr($user->name, 0, 1, 'UTF-8') . '. '
                        . mb_substr($user->patronymic, 0, 1, 'UTF-8') . '.';
                }
                ?>
            </select>
        </label>
        <label>Кабинет<br>
            <select name="cabinet_id">
                <option>Выберите кабинет</option>
                <?php foreach ($cabinets as $cabinet){
                    echo '<option value="' .$cabinet->cabinet_id. '">' . $cabinet->title;
                }
                ?>
            </select>
        </label>
    </div>
    <div class="form_col">
        <div class="form_row">
            <label>Дата <br><input type="date" name="date"></label>
            <label>Время <br><input type="time" name="time"></label>
        </div>
        <label>Диагноз<br>
            <select name="diagnosis_id">
                <option value="">Выберите диагноз</option>
                <?php foreach ($diagnosis as $diag){
                    echo '<option value="' .$diag->diagnosis_id. '">' . $diag->title;
                }
                ?>
            </select>
        </label>
        <button>СОХРАНИТЬ</button>
    </div>

</form>