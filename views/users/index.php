<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchUsers */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
?>
<div class="users-index">
<h1><?= Html::encode($this->title) ?></h1>

    <div class="mb-3">
        <p>
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span>Create Users', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <table class="table table-striped table-bordered custom-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>User Level</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataProvider->getModels() as $index => $model): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= Html::encode($model->username) ?></td>
                    <td><?= Html::encode($model->fullname) ?></td>
                    <td><?= Html::encode($model->email) ?></td>
                    <td>
    <?= Html::a('<i class="fa fa-eye" aria-hidden="true"></i> View', ['view', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm custom-btn']) ?>
    <?= Html::a('<i class="fa fa-pencil" aria-hidden="true"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-secondary btn-sm custom-btn']) ?>
    <?php if (Yii::$app->user->identity->level == 1): ?>
        <?= Html::a('<i class="fa fa-trash" aria-hidden="true"></i> Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm custom-btn',
            'data' => [
                'confirm' => 'Are you sure you want to delete this user?',
                'method' => 'post',
            ],
        ]) ?>
    <?php endif; ?>
</td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php
$css = <<<CSS
    .custom-table {
        margin-top: 20px;
        width: 100%;
    }
    .custom-table th, .custom-table td {
        text-align: left;
        vertical-align: middle;
        padding: 12px;
    }
    .custom-btn {
        margin-right: 5px;
    }
    .text-end {
        text-align: right;
    }
CSS;

$this->registerCss($css);
?>
