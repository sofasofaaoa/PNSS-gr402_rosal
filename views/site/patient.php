<div class="h1">
    <h1>ПАЦИЕНТ</h1>
</div>
<div class="patient">
    <form method="post">
        <div class="form_col">
            <label>Фамилия <br><p><?= $patient->surname ?></p></label>
            <label>Имя <br><p><?= $patient->name ?></p></label>
            <label>Отчество <br><p><?= $patient->patronymic ?></p></label>
            <label>Дата рождения <br><p><?= $patient->date_of_birth ?></p></label>
            <label>Диагнозы: <br>
                <?php
                foreach ($patient->getreceptions as $key => $reception){?>
                    <p><?= $reception->getdiagnoses->title ?></p>
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
            foreach ($patient->getreceptions as $key => $reception) {
                echo '<tr>'
                    .'</td>'.'<td>' . $reception->getdoctors->surname
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