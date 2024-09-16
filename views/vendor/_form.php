<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vendor */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
.vendor-form {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f7f7f7;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.vendor-form .form-group {
    margin-bottom: 15px;
}

.vendor-form .form-control {
    border-radius: 4px;
    border: 1px solid #ccc;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
}

.vendor-form .btn-success {
    background-color: #28a745;
    border-color: #28a745;
    border-radius: 4px;
    padding: 10px 20px;
    font-size: 16px;
}

.vendor-form .btn-success:hover {
    background-color: #218838;
    border-color: #1e7e34;
}
</style>

<div class="vendor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Enter Vendor Name']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Enter Email']) ?>

    <?= $form->field($model, 'contact')->textInput(['placeholder' => 'Enter Contact Number']) ?>

    <?= $form->field($model, 'pan')->textInput(['maxlength' => true, 'placeholder' => 'Enter PAN']) ?>

    <?= $form->field($model, 'gstin')->textInput(['maxlength' => true, 'placeholder' => 'Enter GSTIN']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
