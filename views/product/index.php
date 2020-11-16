<?php
use yii\helpers\Html;
?>
<div class="body-content">
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::a('Create',['/product/create'] ,['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">parent Category</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($products)>0): ?>
            <?php foreach ($products as $product): ?>
                <?php $parentName = $product->category ?>
            <tr class="table-active">
                <th scope="row"><?= $product->id ?></th>
                <td><?= $product->title ?></td>
                <td><?= $parentName->title ?></td>
                <td><?= $product->description ?></td>
                <td><?= Html::img('@web/uploads/'. $product->image,['style'=>'width:50px;height:50px']);?></td>
                <td>
                    <span><?= Html::a('Edit',['product/update?id=' .$product->id ]) ?></span>
                    <span><?= Html::a('Delete',['product/delete?id=' .$product->id ]) ?></span>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td>No Records Found</td>
            </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
