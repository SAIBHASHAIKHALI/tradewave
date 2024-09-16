<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchInvoice */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoices';
?>
<div class="invoice-index">
<h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-12 text-left">
            <p>
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New Invoice', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>

    <table class="table table-bordered table-hover custom-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Invoice Number</th>
                <th>Invoice Date</th>
                <th>Client Name</th>
                <th>Payment Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataProvider->getModels() as $index => $model): ?>
                <tr class="<?= $model->payment_status == 1 ? 'success' : 'warning' ?>">
                    <td><?= $index + 1 ?></td>
                    <td><?= Html::encode($model->invoice_number) ?></td>
                    <td><?= Html::encode($model->invoice_date) ?></td>
                    <td><?= Html::encode($model->client->companyname) ?></td>
                    <td><?= $model->payment_status == 1 ? 'Paid' : 'Not Paid' ?></td>
                    <td>
                        <?= Html::a('View', ['view', 'id' => $model->invoice_id], ['class' => 'btn btn-primary btn-sm custom-btn']) ?>
                        <?= Html::a('Update', ['update', 'id' => $model->invoice_id], ['class' => 'btn btn-secondary btn-sm custom-btn']) ?>
                       
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
    .custom-table tbody tr.success {
        background-color: #dff0d8;
    }
    .custom-table tbody tr.warning {
        background-color: #fcf8e3;
    }
    .custom-btn {
        margin-right: 5px;
    }
CSS;

$this->registerCss($css);
?>
