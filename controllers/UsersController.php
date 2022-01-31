<?php

namespace app\controllers;

use app\models\Users;

class UsersController extends \yii\web\Controller
{
    public function actionView(): string
    {
        $users = Users::find()->all();

        return $this->render('view', [
            'users' => $users,
        ]);
    }


    public function actionCreate(): string
    {

        $user = new Users ();

        if (\Yii::$app->request->isPost) {
            $user->load(\Yii::$app->request->post());
            if ($user->validate()) {
                $user->save();
            }
        }

        $users = Users::find()->all();

        return $this->render('create', [
           'users' => $users,
        ]);
    }
}

