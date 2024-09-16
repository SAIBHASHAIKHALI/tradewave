<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchDepartments */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';

?>
<div class="departments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span>Create Department', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table table-bordered table-hover custom-table">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataProvider->getModels() as $index => $model): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= Html::encode($model->id) ?></td>
                    <td><?= Html::encode($model->name) ?></td>
                    <td><?= Html::encode($model->description) ?></td>
                    <td><?= Html::encode($model->created_at) ?></td>
                    <td><?= Html::encode($model->updated_at) ?></td>
                    <td>
                        <?= Html::a('View', ['view', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm custom-btn']) ?>
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-secondary btn-sm custom-btn']) ?>
                      
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php
$css = <<<CSS
    .custom-table {
        width: 100%;
        margin-top: 20px;
    }
    .custom-table thead {
        background-color: #f8f9fa;
    }
    .custom-table th, .custom-table td {
        padding: 12px;
        text-align: left;
    }
    .custom-table tbody tr:hover {
        background-color: #f1f1f1;
    }
    .custom-btn {
        margin-right: 5px;
    }
CSS;

$this->registerCss($css);
?>
