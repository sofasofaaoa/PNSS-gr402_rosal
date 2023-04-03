<div class="h1">
    <h1>ПАЦИЕНТ</h1>
</div>
<div class="patient">
    <form method="post">
        <div class="form_col">
            <label>Фамилия <br><p><?= $patients[0]->surname ?></p></label>
            <label>Имя <br><p><?= $patients[0]->name ?></p></label>
            <label>Отчество <br><p><?= $patients[0]->patronymic ?></p></label>
            <label>Дата рождения <br><p><?= $patients[0]->date_of_birth ?></p></label>
            <label>Диагнозы: <br>
                <?php
                foreach ($diagnoses as $diagnosis){?>
                    <p><?= $diagnosis[0]->title ?></p>
                <?php }?>
            </label>
        </div>
    </form>
    <div class="table">
        <table>
            <thead>
            <tr>
                <th>Врач</th>
                <th>Кабинет</th>
                <th>Дата</th>
                <th>Время</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($receptions as $key => $reception) {
                echo '<tr>'
                    .'</td>'.'<td>' . $doc[$key]->surname
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