<?php

use app\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/** @var  $form yii\widgets\ActiveForm */
/** @var $this yii\web\View */
/** @var  $model app\models\Category */
$this->title = 'Update product Color';
?>
<?php $form = ActiveForm::begin([
    'id' => 'category-form',
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
            <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>