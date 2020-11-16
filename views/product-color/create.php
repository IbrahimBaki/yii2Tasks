<?php

use app\models\Category;
use app\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/** @var  $form yii\widgets\ActiveForm */
/** @var $this yii\web\View */
/** @var  $model app\models\ProductColor */
$this->title = 'Add Product';
?>
<?php $form = ActiveForm::begin([
    'id' => 'product-color-form',
    'options' => [
            'class' => 'form-horizontal',
        'enctype' => 'multipart/form-data'
    ],
]); ?>
<?= $form->field($model, 'product_id')->dropDownList(
        ArrayHelper::map(Product::find()->all(),'id','title'),
    ['prompt'=>'Select Product',]) ?>
<?= $form->field($model, 'color')->textInput() ?>
<?= $form->field($model, 'price')->textInput() ?>


    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>