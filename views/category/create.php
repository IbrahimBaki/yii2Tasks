<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/** @var  $form yii\widgets\ActiveForm */
/** @var $this yii\web\View */
/** @var  $model app\models\Category */
$this->title = 'Create Category';
?>
<?php $form = ActiveForm::begin([
    'id' => 'category-form',
    'options' => [
            'class' => 'form-horizontal',
        'enctype' => 'multipart/form-data'
    ],
]); ?>
<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'description') ?>
<?= $form->field($model, 'image')->fileInput() ?>


    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>