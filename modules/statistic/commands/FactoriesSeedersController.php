<?php

namespace app\modules\statistic\commands;

use yii\console\Controller;
use app\modules\statistic\seeders\StatisticSeeder;

class FactoriesSeedersController extends Controller
{
    /**
     * Запускает сидер для таблицы statistics.
     * @param int $count Количество записей для создания.
     */
    public function actionSeed($count = 10)
    {
        StatisticSeeder::seed($count);
        echo "Seeded $count records into the statistics table.\n";
    }
}