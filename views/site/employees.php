<div class="h1">
    <h1>СОТРУДНИКИ</h1><button><a href="<?= app()->route->getUrl('/signup') ?>">ДОБАВИТЬ</a></button>
</div>
<div class="table">
    <table>
        <thead>
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Должность</th>
            <th>Специализация</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($employees as $employee) {
            echo '<tr>'
                .'<td>' .$employee->surname .'</td>'
                .'<td>' . $employee->name .'</td>'
                .'<td>' . $employee->patronymic . '</td>'
                .'<td>' . $employee->job_title_id . '</td>'
                .'<td>' . $employee->specialization . '</td>'
                .'<td><a href="' . app()->route->getUrl('/employee?id='. $employee->id) . '">Подробнее</a></td>'
                .'</tr>';
        }
        ?>
        </tbody>
    </table>
</div>