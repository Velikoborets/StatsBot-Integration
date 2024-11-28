<?php

namespace app\modules\statistic\factories;

use app\modules\statistic\models\Statistic;
use Faker\Factory;

class StatisticFactory
{
    public static function create($count = 1)
    {
        $faker = Factory::create();
        $statistics = [];

        for ($i = 0; $i < $count; $i++) {
            $statistics[] = new Statistic([
                'name' => $faker->word,
                'clicks' => $faker->numberBetween(0, 1000),
                'leads' => $faker->numberBetween(0, 500),
                'cost' => $faker->randomFloat(2, 0, 1000),
                'profit' => $faker->randomFloat(2, 0, 1000),
                'roi' => $faker->randomFloat(2, 0, 100),
                'date' => $faker->date(),
            ]);
        }

        return $statistics;
    }
}