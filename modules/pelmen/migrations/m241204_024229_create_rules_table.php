<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rules}}`.
 */
class m241204_024229_create_rules_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%rules}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'column1' => $this->string()->notNull(),
            'operator1' => $this->string()->notNull(),
            'value1' => $this->decimal(10, 2)->notNull(),
            'column2' => $this->string()->notNull(),
            'operator2' => $this->string()->notNull(),
            'value2' => $this->decimal(10, 2)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex(
            'idx-rules-user_id',
            '{{%rules}}',
            'user_id'
        );

        $this->addForeignKey(
            'fk-rules-user_id',
            '{{%rules}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Удаление внешнего ключа и индекса
        $this->dropForeignKey(
            'fk-rules-user_id',
            '{{%rules}}'
        );

        $this->dropIndex(
            'idx-rules-user_id',
            '{{%rules}}'
        );

        $this->dropTable('{{%rules}}');
    }
}
