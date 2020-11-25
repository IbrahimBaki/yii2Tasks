<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductColor */

$this->title = $model->color;
$this->params['breadcrumbs'][] = ['label' => 'Product Colors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-color-view">

    <h1><?= Html::encode($model->product->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        //'bootstrap'=>true,
        'bordered'=>true,
        'panel'=>[
            'heading'=>'Category # ' . $model->id,
            'type'=>DetailView::TYPE_INFO,
        ],
        'attributes' => [
            'id',
            [
                'attribute'=>'product_id',
                'value'=>$model->product->title,

            ],
            'color',
            'price',
        ],
    ]) ?>

</div>
