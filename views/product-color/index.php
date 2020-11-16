<?php
use yii\helpers\Html;
?>
<div class="body-content">
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::a('Add Product color',['/product-color/create'] ,['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product</th>
                <th scope="col">Color</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($colors)>0): ?>
            <?php foreach ($colors as $color): ?>
                <?php $parentName = $color->product ?>
            <tr class="table-active">
                <th scope="row"><?= $color->id ?></th>
                <td><?= $parentName->title ?></td>
                <td><?= $color->color ?></td>
                <td><?= $color->price ?></td>
                <td>
                    <span><?= Html::a('Edit',['product-color/update?id=' .$color->id ]) ?></span>
                    <span><?= Html::a('Delete',['product-color/delete?id=' .$color->id ]) ?></span>
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
