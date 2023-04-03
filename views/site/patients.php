<div class="h1">
    <h1>ПАЦИЕНТЫ</h1><?php if ((new Model\User)->is_reg()){ ?><button><a href="<?= app()->route->getUrl('/newpatient') ?>">ДОБАВИТЬ</a></button><?php } ?>
</div>
<div class="table">
    <table>
        <thead>
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Дата рождения</th>
            <th>Подробнее</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($patients as $patient) {
            echo '<tr>'
                .'<td>' .$patient->surname .'</td>'
                .'<td>' . $patient->name .'</td>'
                .'<td>' . $patient->patronymic . '</td>'
                .'<td>' . $patient->date_of_birth . '</td>'
                . '<td><a href="' . app()->route->getUrl('/patient?patient_id='. $patient->patient_id) . '">Подробнее</a></td>'
                .'</tr>';
        }
        ?>
        </tbody>
    </table>
</div>