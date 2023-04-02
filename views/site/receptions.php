<div class="h1">
    <h1>ЗАПИСИ</h1><button><a href="<?= app()->route->getUrl('/newreception') ?>">ДОБАВИТЬ</a></button>
</div>
<div class="table">
    <table>
        <thead>
        <tr>
            <th>Пациент</th>
            <th>Врач</th>
            <th>Кабинет</th>
            <th>Дата</th>
            <th>Время</th>
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
