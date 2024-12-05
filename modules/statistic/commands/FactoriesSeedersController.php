<?php

namespace app\modules\statistic\commands;

use yii\console\Controller;
use app\modules\statistic\seeders\StatisticSeeder;

class FactoriesSeedersController extends Controller
{
    /**
     * push seed for statistics table
     * @param int $count
     */
    public function actionSeed($count)
    {
        StatisticSeeder::seed($count);
        echo "Seeded $count records into the statistics table.\n";
    }
}