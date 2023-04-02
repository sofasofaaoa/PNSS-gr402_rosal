<div class="h1">
    <h1>ПАЦИЕНТЫ</h1><button><a href="<?= app()->route->getUrl('/newpatient') ?>">ДОБАВИТЬ</a></button>
</div>
<div class="table">
    <table>
        <thead>
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Дата рождения</th>
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
                . '<td><a href="'. app()->route->getUrl('/deluser') .'">X</a></td>'
                .'</tr>';
        }
        ?>
        </tbody>
    </table>
</div>