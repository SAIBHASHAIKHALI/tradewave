<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Invoice;

$this->title = "Invoice Report";
?>

<style>
/* Include your CSS styles here or link to an external stylesheet */
</style>
<h1><?= Html::encode($this->title) ?></h1>
<!-- Filter Form -->
<?php $form = ActiveForm::begin([
    'method' => 'get',
    'options' => ['class' => 'form-inline mb-4']
]); ?>
    <?= Html::input('date', 'start_date', Yii::$app->request->get('start_date'), ['class' => 'form-control mr-2', 'placeholder' => 'Start Date']) ?>
    <?= Html::input('date', 'end_date', Yii::$app->request->get('end_date'), ['class' => 'form-control mr-2', 'placeholder' => 'End Date']) ?>
    <?= Html::dropDownList('payment_status', Yii::$app->request->get('payment_status'), ['1' => 'Paid', '0' => 'Not Paid'], ['class' => 'form-control mr-2', 'prompt' => 'Select payment status ...']) ?>
    <?= Html::submitButton('Filter', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>

<!-- Invoice Table -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sr. No</th>
            <th>Invoice Number</th>
            <th>Invoice Date</th>
            <th>Payment Status</th>
            <th>Total Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;
        $models = $dataProvider->getModels();
        foreach ($models as $key => $model) {
            $contents = json_decode($model->content, true); // Decoding as associative array
            $subtotal = 0;
            foreach ($contents as $content) {
                $subtotal += $content[2] * $content[3];
            }
            $total += $subtotal;
            $class = $model->payment_status == 1 ? 'table-success' : 'table-warning'; // Bootstrap table classes
            echo '<tr class="' . $class . '">
            <td>' . ($key + 1) . '</td>
            <td>' . Html::encode($model->invoice_number) . '</td>
            <td>' . date('d M Y', strtotime($model->invoice_date)) . '</td>
            <td>' . ($model->payment_status == 1 ? 'Paid' : 'Not Paid') . '</td>
            <td>INR ' . Html::encode(number_format($model->total, 2)) . '</td>
        </tr>';
        
        }
        ?>
    </tbody>
</table>

<!-- Overall Total -->
<?php
$overall = Invoice::find()->sum('total');
?>
<p><strong>Total Amount: </strong>INR <?= Html::encode(number_format($overall, 2)) ?></p>
<style>
    /* General table styling */
.table {
    width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
}

.table-bordered {
    border: 1px solid #dee2e6;
}

.table-bordered th,
.table-bordered td {
    border: 1px solid #dee2e6;
}

.table th,
.table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

.table thead th {
    vertical-align: bottom;
    background-color: #f8f9fa;
    color: #495057;
}

.table tbody + tbody {
    border-top: 2px solid #dee2e6;
}

.table-success {
    background-color: #d4edda;
}

.table-warning {
    background-color: #fff3cd;
}

/* Form styling */
.form-inline .form-control {
    width: auto;
    display: inline-block;
}

.form-inline .form-group {
    margin-bottom: 0;
}

.form-group {
    margin-bottom: 1rem;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
}

/* Overall container styling */
.container {
    margin: 0 auto;
    padding: 2rem;
    max-width: 1200px;
}

.page-header {
    margin-bottom: 1.5rem;
    padding-bottom: .5rem;
    border-bottom: 1px solid #e5e5e5;
}

</style>