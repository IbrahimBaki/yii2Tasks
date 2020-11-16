<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_color}}`.
 */
class m201115_101942_create_product_color_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_color}}', [
            'id' => $this->primaryKey(),
            'product_id'=>$this->integer()->notNull(),
            'price'=>$this->decimal(5,2),
        ]);
        $this->createIndex(
            'idx-product_color-product_id',
            '{{%product_color}}',
            'product_id'
        );
        $this->addForeignKey(
            'fk_product_color_product_id',
            '{{%product_color}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE',
            'CASCADE'

        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_color}}');
    }
}
