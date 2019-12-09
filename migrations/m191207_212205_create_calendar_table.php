<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%calendar}}`.
 */
class m191207_212205_create_calendar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('calendar', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'activity_id' => $this->integer()->notNull(),
            'created_at' => $this->bigInteger(),
            'updated_at' => $this->bigInteger(),
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('calendar');
    }
}
