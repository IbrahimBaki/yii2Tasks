<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "product_color".
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $color
 * @property string|null $schedule
 * @property float|null $price
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $slug
 *
 * @property Product $product
 */
class ProductColor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_color';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id'], 'integer'],
            [['price'], 'number'],
            [['color'], 'string', 'max' => 255],
            [['schedule'], 'safe'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product',
            'color' => 'Color',
            'price' => 'Price',
        ];
    }

    public function afterFind() {
        parent::afterFind();
        $this->schedule = \yii\helpers\Json::decode($this->schedule);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
