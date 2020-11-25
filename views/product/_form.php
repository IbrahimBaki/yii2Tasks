<?php

use app\models\Category;
use kartik\select2\Select2;
use unclead\multipleinput\MultipleInput;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $catList app\models\Category */
/* @var $prdColor app\models\ProductColor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
<?php /*
    Modal::begin([
    'options' => [
    'id' => 'kartik-modal',
    'tabindex' => false // important for Select2 to work properly
    ],
//    'title' => 'Select2 Inside Modal',
    'toggleButton' => ['label' => 'Select Category', 'class' => 'btn btn-lg btn-primary'],
    ]);
    echo Select2::widget([
    'name' => 'state_40',
    'data' => $catList,
    'options' => ['placeholder' => 'Select Category ...'],
    'pluginOptions' => [
    'allowClear' => true
    ],
    ]);
    Modal::end();
 */
    ?>
    <?= $form->field($model,'category_id')->widget(Select2::classname(),[
            'data'=>$catList,
            'hideSearch'=>true,
            'theme' => Select2::THEME_KRAJEE,
            'size'=>Select2::LARGE,
            'options' => [
                    'placeholder' => 'Select a Category ...',
                'options'=>[
//                        3=>['disabled'=>true]
                ]
                ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($prdColor, 'schedule')->widget(MultipleInput::className(),[
//            'max'=>6,
            'columns'=>[
                    [
                        'name'=>'color',
                        'type'=>'dropDownList',
                        'title' => 'color',
                        'items' => [
                            'black' => 'black',
                            'white' => 'white',
                            'red' => 'red',
                            'blue' => 'blue',
                            'gold' => 'gold',
                            'silver' => 'silver',
                        ]
                    ],
                    [
                        'name'=>'price',
                        'title' => 'price',
                    ],
            ],
            'allowEmptyList'=>false,
            'enableGuessTitle'=>true,
            'addButtonPosition'=>MultipleInput::POS_HEADER,
    ])->label(false) ?>


    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
