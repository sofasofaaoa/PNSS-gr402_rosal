<div class="h1">
    <h1>ПРИЁМ</h1>
</div>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <div class="form_col">
        <input style="display: none" name="reception_id" value="<?= $reception->reception_id ?>">
        <label>Пациент<br> <p><?= $patients->surname . ' '
                . $patients->name . ' '
                . $patients->patronymic ?></p></label>
        <label>Врач<br> <p><?= $users->surname . ' '
                . $users->name . ' '
                . $users->patronymic ?></p></label>
        <label>Кабинет<br> <p><?= $reception->cabinet_id ?></p></label>
    </div>
    <div class="form_col">
        <div class="form_row">
            <label>Дата <br><p><?= $reception->date ?></p></label>
            <label>Время <br><p><?= $reception->time ?></p></label>
        </div>
        <label>Диагноз<br>
            <p><?= $d->title ?></p>
            <?php if ((new Model\User)->is_doctor()): ?>
            <select name="diagnosis_id">
                <?php foreach ($diagnosis as $diag){
                    echo '<option value="' .$diag->diagnosis_id. '">' . $diag->title;
                }
                ?>
            </select>
        </label>
        <button>СОХРАНИТЬ</button>
        <?php endif;?>
    </div>

</form>