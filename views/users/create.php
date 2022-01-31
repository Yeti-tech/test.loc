<?php

use app\models\Users;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var array $users */
/** @var Users $user */
?>


<?php  $user = new Users (); ?>
<?php $form = ActiveForm::begin([
    'id' => 'guest-record-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>

<?= $form->field($user, 'name')->textInput() ?>
<?= $form->field($user, 'surname')->textInput() ?>
<?= $form->field($user, 'age')->input('integer') ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Добавить пользователя', ['class' => 'btn btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end() ?>


<table class="table table-striped">
    <?php
    foreach ($users as $user) : ?>
        <tr>
            <td class="active">
                <?= $user->name ?>
            </td>
            <td class="active">
                <?= $user->surname ?>
            </td>
            <td class="active">
                <?= $user->age ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
<div>
</div>

<a href="http://test.loc/web/guest-record/view">К записям</a>