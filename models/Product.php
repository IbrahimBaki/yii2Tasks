<?php


namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{

    public function behaviors()
    {
        return [
          TimestampBehavior::className(),
        ];

    }

   private $title;
   private $category_id;
   private $description;
   private $image;
   private $created_at;

    public static function tableName()
    {
        return '{{%product}}';
   }

    public function rules()
    {
        return [
            [['title','category_id','description','image'],'required'],
            [['image'],'file','extensions'=>'png,jpg,jpeg']
        ];
    }
    public function attributeLabels()
    {
        return [
            'title' => 'Product Name',
            'category_id' => 'Parent Category',
            'description'=>'Product description',
            'image'=>'Product Image',
            'created_at'=>'Product created date',

        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(),['id'=>'category_id']);
        
    }

    public function getColor()
    {
        return $this->hasMany(ProductColor::className(),['product_id'=>'id']);
    }

}