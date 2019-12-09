<?php

use yii\db\Migration;

/**
 * Class m191208_213321_add_fk_to_activity_table
 */
class m191208_213321_add_fk_to_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk-user_id-activity', 'activity', 'user_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-user_id-activity', 'activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191208_213321_add_fk_to_activity_table cannot be reverted.\n";

        return false;
    }
    */
}
