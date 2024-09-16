<?php
use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\money\MaskMoney;
use yii\helpers\ArrayHelper;
use app\models\Vendor;
use app\models\Ingredients;

/* @var $this yii\web\View */
/* @var $model app\models\Purchase */
/* @var $form kartik\form\ActiveForm */
?>

<div class="purchase-form">
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal'], // Horizontal form layout
        'fieldConfig' => [
            'labelOptions' => ['class' => 'col-sm-3 control-label'], // Label style
            'inputOptions' => ['class' => 'form-control'], // Input style
            'wrapperOptions' => ['class' => 'col-sm-9'], // Field wrapper options
        ],
    ]); ?>

    <div class="form-group">
        <?= $form->field($model, 'vendor_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Vendor::find()->all(), 'vendor_id', 'name'),
            'options' => ['placeholder' => 'Select Vendor'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'item')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'paymentstatus')->widget(Select2::classname(), [
            'data' => [
                'Pending' => 'Pending',
                'Paid' => 'Paid',
                'Overdue' => 'Overdue',
            ],
            'options' => ['placeholder' => 'Select Payment Status'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'amount')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
                'prefix' => 'INR ',
                'allowNegative' => false,
                'affixMoney' => true,
                'thousands' => ',',
                'decimal' => '.',
                'precision' => 2
            ],
        ]) ?>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php
$css = <<<CSS
/* Custom styles for the form */
.purchase-form {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
}

.purchase-form .form-group {
    margin-bottom: 15px;
}

.purchase-form .form-control {
    border-radius: 4px;
}

.purchase-form .btn-success {
    background-color: #28a745;
    border-color: #28a745;
}
CSS;

$this->registerCss($css);
?>
