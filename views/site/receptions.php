
<div class="h1">
    <h1>ЗАПИСИ</h1>
    <?php if ((new Model\User)->is_reg()){ ?>
        <button>
        <a href="<?= app()->route->getUrl('/newreception') ?>">ДОБАВИТЬ</a>
        </button>
    <?php } ?>
</div>
<h3><?= $message ?? ''; ?></h3>
<div class="table">
    <table>
        <thead>
        <tr>
            <th>Пациент</th>
            <th>Врач</th>
            <th>Кабинет</th>
            <th>Дата</th>
            <th>Время</th>
            <th>Подробнее</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($receptions as $reception) {
            echo '<tr>' . '<td>' .$reception->getpatients->surname
                .'</td>'.'<td>' . $reception->getdoctors->surname
                .'</td>'.'<td>' . $reception->cabinet_id
                .'</td>'.'<td>' . $reception->date
                .'</td>'.'<td>' . $reception->time
                . '<td><a href="' . app()->route->getUrl('/reception?reception_id='. $reception->reception_id) . '">Подробнее</a></td>'
                .'</tr>';
        }
        ?>
        </tbody>
    </table>
</div>
