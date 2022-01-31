<?php

namespace app\controllers;

use app\models\GuestRecord;
use Yii;
use yii\db\StaleObjectException;


class GuestRecordController extends \yii\web\Controller
{
    public function actionView(): string
    {
        $guestRecords = GuestRecord::find()->all();
        return $this->render('view', [
            'guestRecords' => $guestRecords, 'id' => $_GET['id'],
        ]);
    }

    public function actionCreate()
    {
        $guestRecord = new GuestRecord();

        if ($guestRecord->load($_POST) && $guestRecord->validate()) {
            $guestRecord->save();
            Yii::$app->session->setFlash('success', 'Запись успешно создана');
            return $this->redirect(["/guest-record/view?id=$guestRecord->id"]);
        }

        return $this->render('create', [
            'guestRecord' => $guestRecord,
        ]);
    }

    public function actionDelete(): \yii\web\Response
    {
        if (isset($_GET['id'])) {
                $guestRecord = GuestRecord::findOne(['id' => $_GET['id']]);
                if ($guestRecord) {
                    try {
                        $guestRecord->delete();
                    } catch (StaleObjectException | \Throwable $e) {
                        return $this->redirect(['/rate/create']);
                    }
                }
                }
        return $this->redirect(['/guest-record/view']);
    }
}