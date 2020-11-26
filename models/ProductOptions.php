<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_options".
 *
 * @property int $id
 * @property int $product_id
 * @property int $color_id
 * @property int $price
 */
class ProductOptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_options';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'color_id', 'price'], 'required'],
            [['color_id'], 'string'],
            [['product_id', 'price'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'color_id' => 'Color ID',
            'price' => 'Price',
        ];
    }
}
