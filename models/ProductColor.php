<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "product_color".
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $color
 * @property float|null $price
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $slug
 *
 * @property Product $product
 */
class ProductColor extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            BlameableBehavior::className(),
            [
            'class' => SluggableBehavior::className(),
            'attribute' => 'color',
            ]
        ];

    }
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
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'slug' => 'Slug',
        ];
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
