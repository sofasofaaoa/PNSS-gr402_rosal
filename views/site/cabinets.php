<div class="h1">
    <h1>КАБИНЕТЫ</h1>
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
        foreach ($cabinets as $cabinet) {
            echo '<tr>' . '<td>' .$cabinet->cabinet_id .'</td>'.'<td>' . $cabinet->title .'</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>
