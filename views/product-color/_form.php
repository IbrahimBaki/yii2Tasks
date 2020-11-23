<?php

use app\models\Category;
use app\models\Product;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductColor */
/* @var $prdList app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-color-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model,'product_id')->widget(Select2::classname(),[
        'data'=>$prdList,
        'hideSearch'=>true,
        'theme' => Select2::THEME_KRAJEE,
        'size'=>Select2::LARGE,
        'options' => ['placeholder' => 'Select product ...',],
        'pluginOptions' => ['allowClear' => true],
    ])->label('Select Product') ?>
<?php
    $dataColors = ['Red'=>'Red','Blue'=>'Blue','White'=>'White','Black'=>'Black','Silver'=>'Silver','Gold'=>'Gold'] ;
?>
    <?= $form->field($model,'color')->widget(Select2::classname(),[
        'data'=>$dataColors,
        'hideSearch'=>true,
        'theme' => Select2::THEME_KRAJEE,
        'size'=>Select2::LARGE,
        'options' => ['placeholder' => 'Select product ...',],
        'pluginOptions' => ['allowClear' => true],
    ])->label('Select Color') ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
