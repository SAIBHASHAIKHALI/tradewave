<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchService */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="service-user-services">

    <h1 class="page-title"><?= Html::encode($this->title) ?></h1>

    <!-- Service Table -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Status</th>
              
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataProvider->getModels() as $model): ?>
                <tr>
                    <td><?= Html::encode($model->id) ?></td>
                    <td><?= Html::encode($model->name) ?></td>
                    <td><?= Html::encode($model->type) ?></td>
                    <td><?= Html::encode($model->status) ?></td>
                    
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<!-- Add Scalar Icons CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/scalaricons@latest/scalaricons.min.css">

<style>
    /* Container for the user services index */
    .service-user-services {
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Page title */
    .page-title {
        font-size: 2rem;
        margin-bottom: 20px;
        font-weight: 600;
        color: #0C122D;
    }

    /* Table styling */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table th, .table td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .table th {
        background-color: #1B5FC1;
        color: #fff;
        font-weight: bold;
    }

    .table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tr:hover {
        background-color: #ddd;
    }

    /* Button styling */
    .btn {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        font-size: 0.875rem;
        font-weight: 400;
        text-align: center;
        text-decoration: none;
        border: 1px solid transparent;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.2s, border-color 0.2s, color 0.2s;
    }

    .btn-info {
        background-color: #17a2b8;
        color: #fff;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-success {
        background-color: #28a745;
        color: #fff;
    }

    .btn-sm {
        font-size: 0.75rem;
        padding: 4px 8px;
    }

    .btn i {
        margin-right: 4px;
    }

    .btn:hover {
        opacity: 0.8;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .table {
            font-size: 0.875rem;
        }
    }
</style>
