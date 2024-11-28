<?php

namespace app\modules\roles\controllers;

use app\modules\roles\models\Role;
use yii\web\Controller;

class RoleController extends Controller
{
    public function actionIndex()
    {
        $roles = Role::find()->all();
        return $this->render('/index', ['roles' => $roles]);
    }

    public function actionCreate()
    {
        $model = new Role();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('/create', ['model' => $model]);
    }

    public function actionView($id)
    {
        $role = Role::findOne($id);
        return $this->render('/views', ['role' => $role]);
    }

    public function actionUpdate($id)
    {
        $role = Role::findOne($id);

        if ($role->load(\Yii::$app->request->post()) && $role->save()) {
            return $this->redirect(['views', 'id' => $role->id]);
        }

        return $this->render('/update', ['model' => $role]);
    }

    public function actionDelete($id)
    {
        Role::findOne($id)->delete();
        return $this->redirect(['/index']);
    }
}