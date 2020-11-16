<?php


namespace app\models;


use yii\db\ActiveRecord;

class ProductColor extends ActiveRecord
{
    private $product_id;
    private $color;
    private $price;

    public static function tableName()
    {
        return '{{%product_color}}';

    }

    public function rules()
    {
        return [
            [['product_id','color','price'],'required'],
            [['price'],'number']
        ];
    }
    public function attributeLabels()
    {
        return [
            'color' => 'Product Color',
            'product_id' => 'Parent Product',
            'price'=>'Product price',

        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(),['id'=>'product_id']);
    }

}