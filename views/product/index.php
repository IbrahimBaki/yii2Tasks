<?php

use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
                'attribute'=>'category_id',
                'value'=>function($data){
                    return $data->category->title;
                },
                'filter'=>ArrayHelper::map(Category::find()->all(), 'id', 'title'),
            ],
            'description',
            [
                 'attribute'=>'image',
                 'format'=>'html',
                'label'=>'Image',
                'value'=>function($data){
                    return Html::img('@web/uploads/'. $data->image ,['width'=>'60px','height'=>'60px']);
                }
            ],
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
        'showPageSummary' => true,
    ]); ?>


</div>
