<?php
/** @var array $users */
?>

<table class="table table-striped">
    <?php
    /** @var \app\models\Users $user */
    foreach ($users as $user) : ?>
        <tr>
            <td class="active">
                <?= $user->name ?>
            </td>
            <td class="active">
                <?= $user->age ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
<div>
</div>

<a href="http://test.loc/web/guest-record/view">Оценить приложение</a>


