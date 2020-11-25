<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this -> title = 'Login';
$this -> params['breadcrumbs'][] = $this -> title;
?>


<div class="brand_color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Login</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php $form = ActiveForm ::begin([
                    'id' => 'login-form',
                    'options'=>[
                            'class'=>'main_form'
                    ],
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-1 control-label'],
                    ],
                ]); ?>
                <div class="row">
                    <div class="col-md-12">
                        <?= $form -> field($model, 'username') -> textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="col-md-12">
                        <?= $form -> field($model, 'password') -> passwordInput() ?>
                    </div>
                    <div class="col-md-12">
                        <?= $form -> field($model, 'rememberMe') -> checkbox([
                            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        ]) ?>
                    </div>


                    <div class="col-md-5 mb-50">
                        <?= Html ::submitButton('Login', ['class' => 'send']) ?>
                    </div>
                </div>
                <?php ActiveForm ::end(); ?>
            </div>
        </div>
    </div>
</div>

