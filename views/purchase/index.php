<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchPurchase */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchases';
?>
<div class="purchase-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span>Create Purchase', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table table-striped table-bordered custom-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Purchase ID</th>
                <th>Vendor ID</th>
                <th>Item</th>
              
                <th>Payment Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataProvider->getModels() as $index => $model): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= Html::encode($model->purchase_id) ?></td>
                    <td><?= Html::encode($model->vendor_id) ?></td>
                    <td><?= Html::encode($model->item) ?></td>
                  
                    <td><?= Html::encode($model->paymentstatus) ?></td>
                    <td>
                        <?= Html::a('View', ['view', 'id' => $model->purchase_id], ['class' => 'btn btn-primary btn-sm custom-btn']) ?>
                        <?= Html::a('Update', ['update', 'id' => $model->purchase_id], ['class' => 'btn btn-secondary btn-sm custom-btn']) ?>
                        <?php if (Yii::$app->user->identity->level == 1): ?>
        <?= Html::a('<i class="fa fa-trash" aria-hidden="true"></i> Delete', ['delete', 'id' => $model->purchase_id], [
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
CSS;

$this->registerCss($css);
?>
