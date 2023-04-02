<div class="h1">
    <h1>ПАЦИЕНТ</h1>
</div>
<div class="patient">
    <form method="post">
        <div class="form_col">
            <label>Фамилия <br><input readonly type="text" name="surname" value="<?= $patients->surname ?>"></label>
            <label>Имя <br><input readonly type="text" name="name" value="<?= $patients->name ?>"></label>
            <label>Отчество <br><input readonly type="text" name="patronymic" value="<?= $patients->patronymic ?>"></label>

            <div class="form_row">
                <label>Пол<br>
                    <select disabled name="sex">
                        <option><?= $patients->sex ?></option>
                    </select>
                </label>
                <label>Дата рождения <br><input readonly type="date" name="date_of_birth" value="<?= $patients->date_of_birth ?>"></label>
            </div>
        </div>
    </form>
    <div class="table">
        <table>
            <thead>
            <tr>
                <th>Врач</th>
                <th>Дата</th>
                <th>Время</th>
                <th>Кабинет</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($receptions as $reception) {
                echo '<tr>' . '<td>' .$reception->patient_id
                    .'</td>'.'<td>' . $reception->id
                    .'</td>'.'<td>' . $reception->cabinet_id
                    .'</td>'.'<td>' . $reception->date
                    .'</td>'.'<td>' . $reception->time
                    .'</td></tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>