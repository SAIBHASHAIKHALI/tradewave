<?php

use yii\helpers\Html;

$createdAt =$model->created_at;
$dateTime = new DateTime($createdAt);
$formattedDate = $dateTime->format('Y-m-d');

/* @var $this yii\web\View */
/* @var $model app\models\Purchase */

$this->title = 'Purchase Invoice';
?>
<div class="purchase-invoice">
    <div class="invoice-header">
        <h1><?= Html::encode($this->title) ?></h1>
        <address>
            <strong>Vendor:</strong><br>
            <?= Html::encode($model->vendor->name ?? 'Unknown') ?><br>
            <?= Html::encode($model->vendor->contact ?? '-') ?><br>
            <?= Html::encode($model->vendor->pan ?? '-') ?><br>
            <?= Html::encode($model->vendor->gstin ?? '-') ?> 
        </address>
        <address>
            <strong>Customer:Anklyticx</strong><br>
            <!-- Add customer details here -->
        </address>
        <table class="invoice-details">
            <tr>
                <td><strong>Purchase Bill Number:</strong></td>
                <td><?= Html::encode($model->purchase_id) ?></td>
            </tr>
            <tr>
                <td><strong>Date:<?php echo $formattedDate ?></strong></td>
                <td></td>
            </tr>
        </table>
    </div>

    <div class="invoice-items">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= Html::encode($model->item) ?></td>
                    <td>1</td> <!-- Assuming quantity is always 1 -->
                    <td>₹<?= ($model->amount) ?></td> <!-- Using amount as unit price -->
                    <td>₹<?= ($model->amount) ?></td> <!-- Using amount as total -->
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="invoice-footer">
        <p class="total"><strong>Total:</strong>₹ <?= ($model->amount) ?></p>
    </div>

    <!-- Print button -->
    <div class="print-button">
        <?= Html::button('Print', ['class' => 'btn btn-primary', 'id' => 'printButton']) ?>
    </div>
</div>

<style>
.purchase-invoice {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
}

.invoice-header {
    margin-bottom: 30px;
}

.invoice-header h1 {
    text-align: center;
    margin-bottom: 10px;
}

.invoice-header address {
    margin-bottom: 20px;
}

.invoice-items {
    margin-bottom: 30px;
}

.invoice-footer {
    text-align: right;
}

.invoice-footer .total {
    font-size: 18px;
}

/* Hide print button and other navigation elements when printing */
@media print {
    .print-button,
    .navbar {
        display: none !important;
    }
}
</style>

<?php
// JavaScript to handle printing
$this->registerJs("
    document.getElementById('printButton').addEventListener('click', function() {
        window.print();
    });
");
?>
