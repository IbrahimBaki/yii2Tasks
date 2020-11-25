<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NewUser */
/* @var $form ActiveForm */

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="brand_color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Register</h2>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="contact">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'options'=>[
                    'class'=>'main_form'
                ],
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>
<div class="row">

    <div class="col-md-12">
    <?= $form->field($model, 'username')->textInput() ?>
    </div>
    <div class="col-md-12">
    <?= $form->field($model, 'email')->textInput() ?>
    </div>
    <div class="col-md-12">
    <?= $form->field($model, 'password')->passwordInput() ?>
    </div>

    <div class="col-md-5 mb-50">
        <?= Html::submitButton('Submit', ['class' => 'send']) ?>
    </div>
</div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</div>