<?php


namespace app\models;


use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use  yii\helpers\Inflector;

class ProductColor extends ActiveRecord
{
    private $product_id;
    private $color;
    private $price;




    public function behaviors()
    {
        return [
            BlameableBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute'=>'color',
            ],


        ];
    }

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