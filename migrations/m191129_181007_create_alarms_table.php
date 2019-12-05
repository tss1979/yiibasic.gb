<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%alarms}}`.
 */
class m191129_181007_create_alarms_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%alarms}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%alarms}}');
    }
}
