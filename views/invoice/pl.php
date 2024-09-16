<?php

use yii\helpers\Html;

$this->title = 'Profit and Loss Report';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
/* Container styling */
.profit-loss-report {
    margin: 0 auto;
    padding: 2rem;
    max-width: 1000px;
    background-color: #f8f9fa;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.profit-loss-report h1 {
    margin-bottom: 1.5rem;
    font-size: 2.5rem;
    color: #343a40;
    font-weight: 600;
}

.profit-loss-report h3 {
    margin-bottom: 0.75rem;
    font-size: 1.25rem;
    color: #495057;
    font-weight: 500;
}

.profit-loss-report p {
    font-size: 1.125rem;
    color: #212529;
    padding: 0.5rem 0;
    background: #ffffff;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    text-align: center;
}

/* Responsive layout */
@media (max-width: 768px) {
    .profit-loss-report .row {
        flex-direction: column;
    }
    .profit-loss-report .col-md-6 {
        width: 100%;
    }
}
</style>

<div class="profit-loss-report">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-6">
            <h3>Total Revenue</h3>
            <p>
                <!-- Calculate total revenue -->
                <?= Html::encode(number_format($totalRevenue, 2)) ?>
            </p>
        </div>
        <div class="col-md-6">
            <h3>Total Expenses</h3>
            <p>
                <!-- Calculate total expenses -->
                <?= Html::encode(number_format($totalExpenses, 2)) ?>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3>Net Profit/Loss</h3>
            <p>
                <!-- Calculate net profit or loss -->
                <?= Html::encode(number_format($netProfitLoss, 2)) ?>
            </p>
        </div>
    </div>
</div>
