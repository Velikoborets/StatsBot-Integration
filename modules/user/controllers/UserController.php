<?php

namespace app\modules\user\controllers;

use yii\web\Controller;
use app\models\User;

class UserController extends Controller
{
    public function actionIndex()
    {
        // Получаем всех пользователей с ролями
        $users = User::find()->with('role')->all();
        return $this->render('index', ['users' => $users]);
    }

    public function actionCreate()
    {
        $model = new User();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionView($id)
    {
        $user = User::findOne($id);
        return $this->render('view', ['user' => $user]);
    }

    public function actionUpdate($id)
    {
        $user = User::findOne($id);

        if ($user->load(\Yii::$app->request->post()) && $user->save()) {
            return $this->redirect(['view', 'id' => $user->id]);
        }

        return $this->render('update', ['model' => $user]);
    }

    public function actionDelete($id)
    {
        User::findOne($id)->delete();
        return $this->redirect(['index']);
    }
}