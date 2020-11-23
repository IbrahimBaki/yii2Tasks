<?php

use app\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductColorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Colors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-color-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product Color', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
           // 'product_id',
            [
               'attribute'=>'product_id',
               'value'=>function($data){
                    return $data->product->title;
               },
                'filter'=>ArrayHelper::map(Product::find()->all(), 'id', 'title'),
            ],
            'color',
            'price',
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'pjax' => true,
        'pjaxSettings' => [
            //  'loadingCssClass'=>true,
            'beforeGrid' => 'My fancy content before.',
            'afterGrid' => 'My fancy content after.',
        ],
        'floatHeader' => true,
        'floatHeaderOptions' => ['top' => '50'],
    ]); ?>


</div>
