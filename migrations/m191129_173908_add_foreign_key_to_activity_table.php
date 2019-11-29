<?php

use yii\db\Migration;

/**
 * Class m191129_173908_add_foreign_key_to_activity_table
 */
class m191129_173908_add_foreign_key_to_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('activity_user_id', 'activity', 'user_id', 'users',
            'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('activity_user_id', 'activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191129_173908_add_foreign_key_to_activity_table cannot be reverted.\n";

        return false;
    }
    */
}
