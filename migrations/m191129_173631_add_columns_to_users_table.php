<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%users}}`.
 */
class m191129_173631_add_columns_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%users}}', 'username', $this->string());
        $this->addColumn('{{%users}}', 'password', $this->string());
        $this->addColumn('{{%users}}', 'authKey', $this->bigInteger());
        $this->addColumn('{{%users}}', 'accessToken', $this->integer());

        $this->createIndex('ind-username-users_table', 'users', ['username', 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%users}}', 'usermane');
        $this->dropColumn('{{%users}}', 'password');
        $this->dropColumn('{{%users}}', 'authKey');
        $this->dropColumn('{{%users}}', 'accessToken');

        $this->dropIndex('ind-username-users_table', 'users');

    }
}
