<?php

namespace app\modules\statistic\seeders;

use app\modules\statistic\factories\StatisticFactory;

class StatisticSeeder
{
    public static function seed($count = 10)
    {
        $statistics = StatisticFactory::create($count);

        foreach ($statistics as $statistic) {
            if (!$statistic->save()) {
                // Обработка ошибок при сохранении
                print_r($statistic->getErrors());
            }
        }
    }
}
