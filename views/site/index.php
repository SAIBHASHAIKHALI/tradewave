<?php
use yii\helpers\Html;
use yii\helpers\Json;
use app\models\Invoice;
use app\models\Purchase;

$this->title = 'Dashboard';

// Fetch invoices and purchases
$invoices = Invoice::find()->all();
$purchases = Purchase::find()->where(['is_deleted' => 0])->all();

// Prepare data for charts and tables
$invoiceNumbers = [];
$invoiceTotals = [];
$invoiceDates = [];
foreach ($invoices as $invoice) {
    $invoiceNumbers[] = $invoice->invoice_number;
    $invoiceTotals[] = $invoice->total;
    $invoiceDates[] = date('Y-m-d', strtotime($invoice->invoice_date)); // Format date for trend chart
}

$purchaseItems = [];
$purchaseAmounts = [];
$paymentStatuses = [];
foreach ($purchases as $purchase) {
    $purchaseItems[] = $purchase->item;
    $purchaseAmounts[] = $purchase->amount;
    $paymentStatuses[] = $purchase->paymentstatus;
}

$data = [
    'invoiceNumbers' => $invoiceNumbers,
    'invoiceTotals' => $invoiceTotals,
    'invoiceDates' => $invoiceDates,
    'purchaseItems' => $purchaseItems,
    'purchaseAmounts' => $purchaseAmounts,
    'paymentStatuses' => $paymentStatuses,
];
?>

<div class="dashboard">
    <div class="container main-content">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Invoices</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="invoiceChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Invoices</h5>
                    </div>
                    <div class="card-body">
                        <!-- Add Invoice Data Table -->
                        <table class="table table-striped mt-4">
                            <thead>
                                <tr>
                                    <th>Invoice Number</th>
                                    <th>Total</th>
                                    <th>Invoice Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($invoices as $invoice): ?>
                                    <tr>
                                        <td><?= Html::encode($invoice->invoice_number) ?></td>
                                        <td><?= Html::encode($invoice->total) ?></td>
                                        <td><?= Html::encode(date('Y-m-d', strtotime($invoice->invoice_date))) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Purchase Summary Section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Purchase Summary</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="paymentStatusChart"></canvas>
                        <table class="table table-striped mt-4">
                            <thead>
                                <tr>
                                    <th>Purchase ID</th>
                                    <th>Vendor ID</th>
                                    <th>Item</th>
                                   
                                    <th>Payment Status</th>
                                    <th>Amount</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($purchases as $purchase): ?>
                                    <tr>
                                        <td><?= Html::encode($purchase->purchase_id) ?></td>
                                        <td><?= Html::encode($purchase->vendor->name) ?></td>
                                        <td><?= Html::encode($purchase->item) ?></td>
                                       
                                        <td><?= Html::encode($purchase->paymentstatus) ?></td>
                                        <td><?= Html::encode($purchase->amount) ?></td>
                                        <td><?= Html::encode($purchase->created_at) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$invoiceNumbers = Json::encode($data['invoiceNumbers']);
$invoiceTotals = Json::encode($data['invoiceTotals']);
$invoiceDates = Json::encode($data['invoiceDates']);
$purchaseItems = Json::encode($data['purchaseItems']);
$purchaseAmounts = Json::encode($data['purchaseAmounts']);
$paymentStatuses = Json::encode($data['paymentStatuses']);
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Invoice Totals Bar Chart
        var ctxInvoice = document.getElementById('invoiceChart').getContext('2d');
        new Chart(ctxInvoice, {
            type: 'bar',
            data: {
                labels: <?= $invoiceNumbers ?>,
                datasets: [{
                    label: 'Invoice Totals',
                    data: <?= $invoiceTotals ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Payment Status Pie Chart
        var ctxStatus = document.getElementById('paymentStatusChart').getContext('2d');
        var paymentStatusCounts = {};
        <?= json_encode($paymentStatuses) ?>.forEach(function(status) {
            paymentStatusCounts[status] = (paymentStatusCounts[status] || 0) + 1;
        });
        
        new Chart(ctxStatus, {
            type: 'pie',
            data: {
                labels: Object.keys(paymentStatusCounts),
                datasets: [{
                    label: 'Payment Status Distribution',
                    data: Object.values(paymentStatusCounts),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    });
</script>

<style>
    body {
        background-color: #f4f6f9;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .main-content {
        margin: 20px;
    }

    .card {
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background: #fff;
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .card-body {
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f4f4f4;
    }

    .dashboard .container {
        max-width: 1200px;
        margin: auto;
    }
</style>
