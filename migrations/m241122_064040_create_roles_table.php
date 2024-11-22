<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%roles}}`.
 */
class m241122_064040_create_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Создаем таблицу roles
        $this->createTable('roles', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(255) NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('roles');
    }
}
