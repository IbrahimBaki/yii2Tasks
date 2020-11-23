<?php

use yii\helpers\Html;

//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this -> title = 'Categories';
$this -> params['breadcrumbs'][] = $this -> title;
?>
<div class="category-index">

    <h1><?= Html ::encode($this -> title) ?></h1>

    <p>
        <?= Html ::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView ::widget([
        'moduleId' => 'gridviewKrajee',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description',
//            'image',
            [
                'attribute' => 'image',
                'format' => 'html',
                'label' => 'Image',
                'value' => function ($data) {
                    return Html ::img('@web/uploads/' . $data -> image, ['width' => '60px', 'height' => '60px']);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'responsive' => true,
        'hover' => true,
        'pjax' => true,
        'pjaxSettings' => [
            //  'loadingCssClass'=>true,
            'beforeGrid' => 'My fancy content before.',
            'afterGrid' => 'My fancy content after.',
        ],
        'resizableColumns' => true,
        'resizeStorageKey' => Yii::$app -> user -> id . '-' . date("m"),
        'floatHeader' => true,
        'floatHeaderOptions' => ['top' => '50'],
        'showPageSummary' => true,
    ]); ?>
</div>
