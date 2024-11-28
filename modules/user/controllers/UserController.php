<?php

namespace app\modules\user\controllers;

use app\modules\user\models\User;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionIndex()
    {
        // Получаем всех пользователей с ролями
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => User::find()->with('role'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
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
        return $this->render('views', ['user' => $user]);
    }

    public function actionUpdate($id)
    {
        $user = User::findOne($id);

        if ($user->load(\Yii::$app->request->post()) && $user->save()) {
            return $this->redirect(['views', 'id' => $user->id]);
        }

        return $this->render('update', ['model' => $user]);
    }

    public function actionDelete($id)
    {
        User::findOne($id)->delete();
        return $this->redirect(['index']);
    }
}