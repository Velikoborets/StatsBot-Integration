<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $roles app\models\Role[] */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Create Role', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($roles as $role): ?>
        <tr>
            <td><?= Html::encode($role->id) ?></td>
            <td><?= Html::encode($role->name) ?></td>
            <td>
                <?= Html::a('View', ['view', 'id' => $role->id]) ?>
                <?= Html::a('Update', ['update', 'id' => $role->id]) ?>
                <?= Html::a('Delete', ['delete', 'id' => $role->id], [
                    'data-method' => 'post',
                    'data-confirm' => 'Are you sure you want to delete this role?',
                ]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>