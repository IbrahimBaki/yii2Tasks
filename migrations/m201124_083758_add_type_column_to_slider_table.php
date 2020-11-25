<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%slider}}`.
 */
class m201124_083758_add_type_column_to_slider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%slider}}', 'type', $this->string()->after('title'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%slider}}', 'type');
    }
}
