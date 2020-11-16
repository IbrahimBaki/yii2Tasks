<?php
use yii\helpers\Html;
?>
<div class="body-content">
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::a('Create',['/category/create'] ,['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if(count($categories)>0): ?>
            <?php foreach ($categories as $category): ?>
            <tr class="table-active">
                <th scope="row"><?= $category->id ?></th>
                <td><?= $category->title ?></td>
                <td><?= $category->description ?></td>
                <td><?= Html::img('@web/uploads/'. $category->image,['style'=>'width:50px;height:50px']);?></td>
                <td>
                    <span><?= Html::a('Edit',['category/update?id=' .$category->id ]) ?></span>
                    <span><?= Html::a('Delete',['category/delete?id=' .$category->id ]) ?></span>
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
