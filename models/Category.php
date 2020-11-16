<?php


namespace app\models;

use yii\web\UploadedFile;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    private $title;
    private $description;
    private $image;

    public static function tableName()
    {
        return '{{%category}}';
        
    }
    public function rules()
    {
        return [
            [['title','description'],'required'],
            [['image'],'file','extensions'=>'png,jpg,jpeg']
        ];

    }
    public function attributeLabels()
    {
        return [
            'title' => 'Category Name',
            'description'=>'Category description',
            'image'=>'Category Image',
        ];
    }
//
//    public function upload()
//    {
//        if ($this->validate()) {
//            $this->image-> saveAs('@app/web/uploads/'.$this->image->baseName. '.' . $this->image->extension);
//            return true;
//        }else{
//            return false;
//        }
//
//    }

}