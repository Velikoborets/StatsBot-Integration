<?php

namespace app\modules\statistic\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table statistics
 */
class m241128_080803_create_statistics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('statistics', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'clicks' => $this->integer()->defaultValue(0),
            'leads' => $this->integer()->defaultValue(0),
            'cost' => $this->decimal(10, 2)->defaultValue(0),
            'profit' => $this->decimal(10, 2)->defaultValue(0),
            'roi' => $this->decimal(5, 2)->defaultValue(0),
            'date' => $this->date()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('statistics');
    }
}
