<div class="h1">
    <h1>ДИАГНОЗЫ</h1><div class="new"><button><a href="<?= app()->route->getUrl('/newdiag') ?>">ДОБАВИТЬ</a></button> <input type="text" name="title"></div>
</div>
<div class="table">
    <table>
        <thead>
        <tr>
            <th>Номер</th>
            <th>Название</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($diagnosis as $diag) {
            echo '<tr>' . '<td>' .$diag->diagnosis_id .'</td>'.'<td>' . $diag->title .'</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>
