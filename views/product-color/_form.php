<?php

use app\models\Category;
use app\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductColor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-color-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'product_id')->dropDownList(
        ArrayHelper::map(Product::find()->all(),'id','title'),
        ['prompt'=>'Select product',])->label('Select Product') ?>

    <?= $form->field($model, 'color')->dropDownList(
            ['Red'=>'Red','Blue'=>'Blue','White'=>'White','Black'=>'Black','Silver'=>'Silver','Gold'=>'Gold'],
        ['prompt'=>'Select Color']
    ); ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
