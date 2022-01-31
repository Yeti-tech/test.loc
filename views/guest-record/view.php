<?php

use yii\helpers\Html;
use yii\helpers\arrayHelper;

/** @var array $guestRecords */
/** @var \app\models\GuestRecord $guestRecord */
/** @var \app\models\GuestRecord $rating */
/** @var integer $id */
?>

<style>
    a {
        margin: 0 20px;
    }
</style>

<?php
if (Yii::$app->getSession()->hasFlash('success')): ?>
    <b><?= Html::a('Удалить свою запись',
            $url = ["/guest-record/delete?id=$id"]) ?></b>
<b><?= Html::a('Комментировать запись',
        $url = ["/comment/create?id=$id"]);
    endif; ?> </b>
<br>
<br>
<table class="table table-striped">
    <tr>
        <th>Автор записи</th>
        <th>Текст</th>
        <th>Рейтинг</th>
        <th></th>
    </tr>
    <?php foreach ($guestRecords

    as $guestRecord) : ?>
    <tr>
        <td>
            <?php
            $user = ArrayHelper::getValue($guestRecord->name, function ($user, $defaultValue) {
                return $user->name . ' ' . $user->surname;
            });
            echo $user;
            ?>
        </td>
        <td>
            <?= $guestRecord->text ?>
        </td>
        <td>
            <?= $guestRecord->rating ?>
        </td>
        <td>
            <?= Html::a('Комментировать', $url =
                ["/comment/create?id=$guestRecord->id"])
            ?>
        </td>
        <td>
            <?= Html::a('Удалить',
                $url = ["/guest-record/delete?id=$guestRecord->id"]) ?>
        </td>
        <?php endforeach; ?>
    </tr>
</table>

<?= Html::a('Создать новую запись',
    $url = ["/guest-record/create"]) ?>
<br>
<br>

<?= Html::a('Добавить пользователя',
    $url = ["/users/create"]) ?>











