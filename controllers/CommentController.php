<?php

namespace app\controllers;

use app\models\Comment;
use app\models\GuestRecord;

class CommentController extends \yii\web\Controller
{

    public function actionCreate(): string
    {
        $commentRecord = new Comment();
        $id = htmlspecialchars($_GET['id']);
        $guestRecord = GuestRecord::find()->where(['id' => $id])->one();

        if (\Yii::$app->request->isPost) {
            $rating = htmlspecialchars($_POST['Comment']['rating']);
            if ($rating === '') {
                $rating = 0;
            }
            $guestRecord->calculateTotalRating($guestRecord->rating, $rating);
            $commentRecord->record_id = $_GET['id'];
            if ($commentRecord->load($_POST) && $commentRecord->validate()) {
                $commentRecord->save();
            }
        }
        $allCommentRecords = Comment::find()->where(['record_id' => $id])->all();

        return $this->render('create', [
            'guestRecord' => $guestRecord,
            'commentRecord' => $commentRecord,
            'allCommentRecords' => $allCommentRecords,
        ]);
    }

    public function actionDelete(): \yii\web\Response
    {
        $rateRecord = Comment::findOne(['id' => $_GET['id']]);
        if ($rateRecord) {
            $rateRecord->delete();
            return $this->redirect(["/rate/create?id=$rateRecord->record_id"]);
        }
        return $this->redirect(["/rate/create"]);
    }
}