<?php

use app\models\GuestRecord;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\arrayHelper;
use app\models\Users;

/** @var GuestRecord $guestRecord */

$form = ActiveForm::begin([
    'options' => ['class' => 'form-horizontal'],
]) ?>


<?=$form->field($guestRecord, 'user_id')->dropDownList(ArrayHelper::
map(Users::find()->select(['name', 'surname', 'id'])->all(), 'id', 'displayName' ),
    ['class' => 'form-control inline-block']);

echo $form->field($guestRecord, 'text')->textInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Создать запись', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

<?php ActiveForm::end() ?>
<br>
<br>

<?= Html::a('Посмотреть все записи', $url = ["/guest-record/view"]) ?>

