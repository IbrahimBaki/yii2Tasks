<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute'=>'category_id',
                'value'=>function($data){
                    return $data->category->title;
                }
            ],
            'description',
            //'image',
            [
                'attribute'=>'image',
                'format'=>'html',
                'label'=>'Image',
                'value'=>function($data){
                    return Html::img('@web/uploads/'. $data->image ,['width'=>'60px']);
                }
            ],
            //'created_at',
            [
                'attribute'=>'created_at',
                'value'=>function($data){
                    return date('Y-m-d',$data->created_at);
                }
            ],
            //'updated_at',
            [
                'attribute'=>'updated_at',
                'value'=>function($data){
                    return date('Y-m-d',$data->updated_at);
                }
            ],
        ],
    ]) ?>

</div>