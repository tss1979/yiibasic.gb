<?php

use yii\db\Migration;

/**
 * Class m191129_173536_add_index_to_activity_table
 */
class m191129_173536_add_index_to_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('ind-created_at-activity_table', 'activity', ['created_at', 'started_at']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('ind-created_at-activity_table', 'activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191129_173536_add_index_to_activity_table cannot be reverted.\n";

        return false;
    }
    */
}
