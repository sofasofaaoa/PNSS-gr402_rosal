<div class="h1">
    <h1>ВРАЧ</h1>
</div>
<div class="patient">
    <form>
        <div class="form_col">
            <label>Фамилия <br><p><?= $user->surname ?></p></label>
            <label>Имя <br><p><?= $user->name ?></p></label>
            <label>Отчество <br><p><?= $user->patronymic ?></p></label>
            <label>Дата рождения <br><p><?= $user->date_of_birth ?></p></label>
        </div>
    </form>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th>Пациент</th>
                <th>Кабинет</th>
                <th>Дата</th>
                <th>Время</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($receptions as $key => $reception) {
                echo '<tr>'
                    .'</td>'.'<td>' . $patients[$key]->surname
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