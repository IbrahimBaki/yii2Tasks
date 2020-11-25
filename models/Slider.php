<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $image
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title','type'], 'string', 'max' => 15],
            [['description'], 'string', 'max' => 100],
            [['image'], 'file','extensions' => 'png, jpg, jpeg'],
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
            'type' => 'Type',
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
}
