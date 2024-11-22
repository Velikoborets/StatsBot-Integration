<?php

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
        // Создаем таблицу users с полем role_id
        $this->createTable('users', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . '(255) NOT NULL',
            'email' => Schema::TYPE_STRING . '(255) NOT NULL',
            'role_id' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => Schema::TYPE_TIMESTAMP,
        ]);

        // Добавляем внешний ключ на таблицу roles
        $this->addForeignKey(
            'fk-user-role_id',
            'users',
            'role_id',
            'roles',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
