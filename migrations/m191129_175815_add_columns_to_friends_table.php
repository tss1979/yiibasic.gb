<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%friends}}`.
 */
class m191129_175815_add_columns_to_friends_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('friends', 'name', $this->string());
        $this->addColumn('friends', 'birthday', $this->date());
        $this->addColumn('friends', 'phone', $this->bigInteger());
        $this->addColumn('friends', 'email', $this->string());
        $this->addColumn('friends', 'jobtitle', $this->string());

        $this->createIndex('ind-friend_name-friends_table', 'friends', ['name', 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('friends', 'name');
        $this->dropColumn('friends', 'birthday');
        $this->dropColumn('friends', 'email');
        $this->dropColumn('friends', 'phone');
        $this->dropColumn('friends', 'jobtitle');

        $this->dropIndex('ind-friend_name-friends_table', 'friends');
    }
}
