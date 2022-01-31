<?php

use app\models\Comment;
use app\models\GuestRecord;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php
/** @var GuestRecord $guestRecord */
/** @var Comment $commentRecord */
/** @var Comment[] $allCommentRecords */
?>

<br>
<b><?= $guestRecord->text ?></b>
<br>
<br>
<b>
    <?php if ($guestRecord->rating) {
        echo 'Общий рейтинг записи ' . $guestRecord->rating;
    }
    ?>
</b>
<?php

$form = ActiveForm::begin([
    'id' => 'rate-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
<br>
<?= $form->field($commentRecord, 'rating')->input('number') ?>
<?= $form->field($commentRecord, 'comment')->textInput() ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end() ?>
<br>

<table class="table table-striped">
    <th>Комментарии</th>
    <?php
    foreach ($allCommentRecords as $oneCommentRecord): ?>
        <tr>
            <td>
                <?= $oneCommentRecord->comment ?>
            </td>
            <td>
                <?= Html::a('Удалить', $url = ["/rate/delete?id=$oneCommentRecord->id"]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?= Html::a('Посмотреть все записи', $url = ["/guest-record/view"]) ?>

