<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Invoice */

$this->title = "Invoice - " . $model->invoice_number;
$this->params['breadcrumbs'][] = ['label' => 'Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="invoice-view">
    <?php
    if ($model->payment_status == 1) {
        echo '<div class="alert alert-success" role="alert">Payment towards this invoice is done!</div>';
    } else {
        echo '<div class="alert alert-warning" role="alert">Payment is pending!</div>';
    }
    ?>
    <div class="text-right">
        <p>
            <?= Html::a('<span class=\'glyphicon glyphicon-pencil \'></span> Update', ['update', 'id' => $model->invoice_id], ['class' => 'btn btn-default']) ?>
            <?= Html::a('<span class=\'glyphicon glyphicon-print \'></span> Print Preview', ['invoice/print', 'id' => $model->invoice_id, 'layout' => 'layout1'], ['class' => 'btn btn-primary']) ?>
        </p>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'invoice_number',
            'invoice_date',
            [
                'label' => "GST",
                'value' => function ($model) {
                    return $model->gst . "%";
                },
            ],
            [
                'label' => "Discount",
                'value' => function ($model) {
                    return $model->discount . "%";
                },
            ],
            [
                'label' => "Payment status",
                'value' => function ($model) {
                    return $model->payment_status == 1 ? "Paid" : "Not Paid";
                }
            ],
            'client.companyname',
        ],
    ]) ?>

    <table class="table table-bordered">
        <tr>
            <th>Sr. No</th>
            <th>Content</th>
            <th>Unit Price</th>
            <th>Qty</th>
            <th>Amount</th>
        </tr>
        <?php
        $subtotal = 0;
        $model->content = json_decode($model->content);
        $sr_no = 1;
        $discount_amount = 0;
        $gst_amount = 0;
        if (is_array($model->content)) {
            foreach ($model->content as $key => $value) {
                if (is_numeric($value[2]) && is_numeric($value[3])) {
                    $subtotal += $value[2] * $value[3];
                }
                ?>
                <tr>
                    <td><?= $sr_no ?></td>
                    <td>
                        <p><?= $value[0] ?> <br><i><?= $value[1] ?></i></p>
                    </td>
                    <td><?= $value[2] ?></td>
                    <td><?= $value[3] ?></td>
                    <td><?= is_numeric($value[2]) && is_numeric($value[3]) ? $value[2] * $value[3] : 0 ?></td>
                </tr>
                <?php
                $sr_no++;
            }
        }
        ?>
        <tr>
            <td colspan="3"></td>
            <td><b>Subtotal</b></td>
            <td><?= $subtotal ?></td>
        </tr>
        <?php
        if ($model->discount != "" && $model->discount != 0) {
            $discount_amount = $subtotal * ($model->discount / 100);
            ?>
            <tr>
                <td colspan="3"></td>
                <td><b>Discount (<?= $model->discount . "%" ?>)</b></td>
                <td><?= $discount_amount ?></td>
            </tr>
            <?php
        }
        ?>
        <?php
        if ($model->discount != "" && $model->discount != 0) {
            $subtotal -= $discount_amount;
            ?>
            <tr>
                <td colspan="3"></td>
                <td><b>Subtotal after discount</b></td>
                <td><?= $subtotal ?></td>
            </tr>
            <?php
        }
        ?>
        <?php
        if ($model->gst != "" && $model->gst != 0) {
            $gst_amount = $subtotal * ($model->gst / 100);
            ?>
            <tr>
                <td colspan="3"></td>
                <td><b>GST (<?= $model->gst . "%" ?>)</b></td>
                <td><?= $gst_amount ?></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan="3"></td>
            <td><b>TOTAL</b></td>
            <td><?= $subtotal + $gst_amount ?></td>
        </tr>
    </table>

    <div class="row">
        <div class="col-md-4">
            <?php if (!empty($model->additional_fields)) {
                echo "<p><b>Additional Fields</b></p>";
                echo "<ul class=\"list-group\">";
                $extraFields = json_decode($model->additional_fields, true);
                if (is_array($extraFields)) {
                    foreach ($extraFields as $value) {
                        echo "<li class=\"list-group-item\"><u>{$value[0]}</u>: {$value[1]}</li>";
                    }
                }
                echo "</ul>";
            }
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php if (!empty($model->invoice_option)) {
                echo "<p><b>Print Setting</b></p>";
                echo "<ul class=\"list-group\">";
                $extraFields = json_decode($model->invoice_option, true);
                if (is_array($extraFields)) {
                    foreach ($extraFields as $value) {
                        echo "<li class=\"list-group-item\">{$value}</li>";
                    }
                }
                echo "</ul>";
            }
            ?>
        </div>
    </div>
</div>
<style>
    /* Button Styles */
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: #ffffff;
    font-weight: bold;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
    color: #ffffff;
}

.btn-primary .glyphicon {
    margin-right: 8px;
}

/* Alert Styles */
.alert {
    margin-bottom: 20px;
    padding: 15px;
    font-size: 16px;
    border-radius: 5px;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
}

.alert-warning {
    background-color: #fff3cd;
    color: #856404;
}

/* DetailView Styles */
.detail-view th {
    width: 200px;
    background-color: #f8f9fa;
    font-weight: bold;
    text-align: left;
    padding: 10px;
}

.detail-view td {
    background-color: #ffffff;
    padding: 10px;
}

.detail-view tr:nth-child(odd) {
    background-color: #f2f2f2;
}

/* Invoice Items Table Styles */
.table-bordered {
    border: 1px solid #dee2e6;
    margin-bottom: 20px;
}

.table-bordered th, 
.table-bordered td {
    border: 1px solid #dee2e6;
    padding: 12px;
    text-align: left;
    vertical-align: middle;
}

.table-bordered th {
    background-color: #007bff;
    color: #ffffff;
    font-weight: bold;
}

.table-bordered tr:nth-child(odd) {
    background-color: #f8f9fa;
}

.table-bordered tr:last-child td {
    font-weight: bold;
    background-color: #f1f1f1;
}

.table-bordered td p {
    margin: 0;
    font-size: 14px;
}

.table-bordered td i {
    font-size: 12px;
    color: #6c757d;
}

/* List Group Styles (for Additional Fields & Print Setting) */
.list-group-item {
    padding: 8px 16px;
    border: 1px solid #dee2e6;
    background-color: #ffffff;
}

.list-group-item:nth-child(odd) {
    background-color: #f8f9fa;
}

.list-group-item u {
    font-weight: bold;
    color: #343a40;
}

.list-group-item:hover {
    background-color: #e9ecef;
}

/* General Layout Enhancements */
.text-right p {
    margin-bottom: 20px;
}

.invoice-view {
    background-color: #f1f1f1;
    padding: 20px;
    border-radius: 5px;
}

</style>