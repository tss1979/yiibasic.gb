<?php

use yii\db\Migration;

/**
 * Class m191207_212058_add_fk_to_activity_table
 */
class m191207_212058_add_fk_to_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk-user_id-activity', 'activity', 'author_id', 'user', 'id');
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
        echo "m191207_212058_add_fk_to_activity_table cannot be reverted.\n";

        return false;
    }
    */
}
