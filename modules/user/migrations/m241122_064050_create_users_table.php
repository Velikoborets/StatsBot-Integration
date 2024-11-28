<?php

namespace app\modules\user\migrations;

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m241122_064050_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
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
        $this->dropTable('users');
    }
}
