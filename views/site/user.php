<div class="h1">
    <?php if (app()->auth::user()->job_title_id === 2){?>
        <h1>ВРАЧ</h1>
    <?php }else {?>
        <h1>СОТРУДНИК</h1>
    <?php }?>
</div>
<div class="patient">
    <form>
        <div class="form_col">
            <?php if ($user->filename){?>
                <img src="public/img/<?= $user->filename?>" alt="photo" width="180px">
            <?php }?>
            <p><?= $user->surname ?> <?= $user->name ?> <?= $user->patronymic ?></p>
            <p><?= $user->date_of_birth ?>г.р.</p></label>
        </div>

    </form>
    <?php if (app()->auth::user()->job_title_id === 2){?>
        <div class="table">
            <table>
                <thead>
                <tr>
                    <th>Пациент</th>
                    <th>Кабинет</th>
                    <th>Дата</th>
                    <th>Время</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($receptions as $key => $reception) {
                    echo '<tr>'
                        .'</td>'.'<td>' . $patients[$key]->surname
                        .'</td>'.'<td>' . $reception->cabinet_id
                        .'</td>'.'<td>' . $reception->date
                        .'</td>'.'<td>' . $reception->time
                        .'</td></tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    <?php }?>
</div>