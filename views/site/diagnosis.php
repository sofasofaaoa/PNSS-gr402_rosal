<div class="h1">
    <h1>ДИАГНОЗЫ</h1>
    <form method="post">
        <input type="text" name="title">
        <button>ДОБАВИТЬ</button>
    </form>
</div>
<h3><?= $message ?? ''; ?></h3>
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
