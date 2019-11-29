<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%friends}}`.
 */
class m191129_175728_create_friends_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%friends}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%friends}}');
    }
}
