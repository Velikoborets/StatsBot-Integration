<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $statistics app\modules\statistic\models\Statistic[] */

$this->title = 'Результат анализа правила';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (empty($statistics)): ?>
    <p>Нет данных, соответствующих заданным правилам анализа.</p>
<?php else: ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Clicks</th>
            <th>Leads</th>
            <th>Cost</th>
            <th>Profit</th>
            <th>ROI</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($statistics as $statistic): ?>
            <tr>
                <td><?= Html::encode($statistic->id) ?></td>
                <td><?= Html::encode($statistic->name) ?></td>
                <td><?= Html::encode($statistic->clicks) ?></td>
                <td><?= Html::encode($statistic->leads) ?></td>
                <td><?= Html::encode($statistic->cost) ?></td>
                <td><?= Html::encode($statistic->profit) ?></td>
                <td><?= Html::encode($statistic->roi) ?></td>
                <td><?= Html::encode($statistic->date) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>