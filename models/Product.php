<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\validators\EmailValidator;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $category_id
 * @property string|null $description
 * @property string|null $image
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Category $category
 * @property ProductColor[] $productColors
 */
class Product extends \yii\db\ActiveRecord
{

    public $options;

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];

    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 100],
            [['options'], 'safe'],
            [['description'], 'string', 'max' => 1000],
            [['image'],'file','skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'category_id' => 'Parent Category',
            'description' => 'Description',
            'image' => 'Image',
        ];
    }

    public function upload()
    {
        if($this->validate()){
            $this->image->saveAs('uploads/'. $this->image->baseName . '.' . $this->image->extension);
            return true;
        }else{
            return false;
        }
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[ProductColors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductColors()
    {
        return $this->hasMany(ProductColor::className(), ['product_id' => 'id']);
    }
}
