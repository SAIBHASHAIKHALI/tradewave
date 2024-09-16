<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchVendor */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendors';
?>
<div class="vendor-index">
<h1><?= Html::encode($this->title) ?></h1>
    <div class="mb-3">
        <p>
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span>Create Vendor', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <table class="table table-striped table-bordered custom-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Vendor ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>PAN</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataProvider->getModels() as $index => $model): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= Html::encode($model->vendor_id) ?></td>
                    <td><?= Html::encode($model->name) ?></td>
                    <td><?= Html::encode($model->email) ?></td>
                    <td><?= Html::encode($model->contact) ?></td>
                    <td><?= Html::encode($model->pan) ?></td>
                    <td>
                        <?= Html::a('<i class="fa fa-eye" aria-hidden="true"></i> View', ['view', 'id' => $model->vendor_id], ['class' => 'btn btn-primary btn-sm custom-btn']) ?>
                        <?= Html::a('<i class="fa fa-pencil" aria-hidden="true"></i> Update', ['update', 'id' => $model->vendor_id], ['class' => 'btn btn-secondary btn-sm custom-btn']) ?>
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
