<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchLeaveRequests */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leave Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leave-requests-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <table class="table table-custom table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Employee Name</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Reason</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataProvider->models as $index => $model): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= Html::encode($model->employee->name) ?></td>
                    <td><?= Html::encode($model->leaveType->name) ?></td>
                    <td><?= Html::encode($model->start_date) ?></td>
                    <td><?= Html::encode($model->end_date) ?></td>
                    <td><?= Html::encode($model->reason) ?></td>
                    <td>
                        <a href="<?= Url::to(['view', 'id' => $model->id]) ?>" class="btn btn-primary btn-sm">
                            <i class="icon-eye"></i> View
                        </a>
                        <a href="<?= Url::to(['update', 'id' => $model->id]) ?>" class="btn btn-warning btn-sm">
                            <i class="icon-pencil"></i> Edit
                        </a>
                        <?php if (Yii::$app->user->identity->level == 1): ?>
                            <?= Html::a('<i class="icon-trash"></i> Delete', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger btn-sm',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
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

<!-- Custom Styles for Table -->
<style>
    .table-custom {
        width: 100%;
        background-color: #fff;
        border-collapse: collapse;
    }

    .table-custom thead th {
        background-color: #4CAF50;
        color: white;
        text-align: center;
        padding: 12px 15px;
        font-size: 14px;
    }

    .table-custom tbody td {
        padding: 10px 15px;
        text-align: center;
        vertical-align: middle;
        font-size: 14px;
    }

    .table-custom tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .table-custom tbody tr:hover {
        background-color: #f1f1f1;
    }

    .table-custom .btn {
        margin-right: 5px;
    }

    .table-custom .btn i {
        margin-right: 5px;
    }

    .leave-requests-index {
        padding: 20px;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 12px;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
</style>
