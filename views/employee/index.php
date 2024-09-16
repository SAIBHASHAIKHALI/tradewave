<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchEmployee */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span>Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table table-bordered table-hover custom-table">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Employee ID</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataProvider->getModels() as $index => $model): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= Html::encode($model->id) ?></td>
                    <td><?= Html::encode($model->emp_id) ?></td>
                    <td><?= Html::encode($model->user_id) ?></td>
                    <td><?= Html::encode($model->name) ?></td>
                    <td><?= Html::encode($model->gender) ?></td>
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
