<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product_color}}`.
 */
class m201116_043910_add_color_column_to_product_color_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product_color}}', 'color', $this->string()->after('product_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product_color}}', 'color');
    }
}
