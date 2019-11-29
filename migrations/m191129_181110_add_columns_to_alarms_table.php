<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%alarms}}`.
 */
class m191129_181110_add_columns_to_alarms_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('alarms', 'alarm_name', $this->string());
        $this->addColumn('alarms', 'alarm_start', $this->time());
        $this->addColumn('alarms', 'alarm_end', $this->time());
        $this->addColumn('alarms', 'repeat_alarm', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('alarms', 'alarm_name');
        $this->dropColumn('alarms', 'alarm_start');
        $this->dropColumn('alarms', 'alarm_end');
        $this->dropColumn('alarms', 'repeat_alarm');
    }
}
