<?php

use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/** @var  $form yii\widgets\ActiveForm */
/** @var $this yii\web\View */
/** @var  $model app\models\Product */
$this->title = 'Add Product';
?>
<?php $form = ActiveForm::begin([
    'id' => 'product-form',
    'options' => [
            'class' => 'form-horizontal',
        'enctype' => 'multipart/form-data'
    ],
]); ?>
<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'category_id')->dropDownList(
        ArrayHelper::map(Category::find()->all(),'id','title'),
    ['prompt'=>'Select Category',]) ?>
<?= $form->field($model, 'description')->textarea() ?>
<?= $form->field($model, 'image')->fileInput() ?>
<?= $form->field($model, 'created_at')->input('date') ?>


    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>