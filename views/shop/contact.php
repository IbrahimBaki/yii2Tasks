<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
//
$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand_color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

    <div class="alert alert-success">
        Thank you for contacting us. We will respond to you as soon as possible.
    </div>

    <p>
        Note that if you turn on the Yii debugger, you should be able
        to view the mail message on the mail panel of the debugger.
        <?php if (Yii::$app->mailer->useFileTransport): ?>
            Because the application is in development mode, the email is not sent but saved as
            a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                                                                                                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
            application component to be false to enable email sending.
        <?php endif; ?>
    </p>

<?php else: ?>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us.
        Thank you.
    </p>

<!-- contact -->
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php $form = ActiveForm::begin([
                        'id' => 'contact-form',
                        'options'=>[
                            'class'=>'main_form'
                        ],

                ]); ?>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <?= $form->field($model, 'name')->textInput(['autofocus' => true,'placeholder'=>'Your Name']) ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <?= $form->field($model, 'email')?>
                        </div>
                        <div class=" col-md-12">
                            <?= $form->field($model, 'subject') ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
                        </div>
                        <div class="col-md-12">
                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',

                        ]) ?>
                        </div>
                        <div class=" col-md-12 mb-20">
                                <?= Html::submitButton('Send', ['class' => 'send ', 'name' => 'contact-button']) ?>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
<?php endif; ?>
<!-- end contact -->


