<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Manager */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manager-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal'], // Horizontal form layout
        'fieldConfig' => [
            'labelOptions' => ['class' => 'col-sm-3 control-label'], // Label style
            'inputOptions' => ['class' => 'form-control'], // Input style
        ],
    ]); ?>

    <div class="form-group">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Enter name'])->label('Name') ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Enter email'])->label('Email') ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'address')->textInput(['maxlength' => true, 'placeholder' => 'Enter address'])->label('Address') ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'phonenumber')->textInput(['placeholder' => 'Enter phone number'])->label('Phone Number') ?>
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$css = <<<CSS
/* Custom styles for Manager form */
.manager-form {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.manager-form .form-horizontal {
    margin-left: 0;
    margin-right: 0;
}

.manager-form .form-group {
    margin-bottom: 20px;
}

.manager-form .control-label {
    text-align: left;
    font-weight: bold;
}

.manager-form .form-control {
    border-radius: 4px;
    box-shadow: none;
}

.manager-form .btn-success {
    background-color: #28a745;
    border-color: #28a745;
    font-size: 16px;
    padding: 10px 20px;
}

.manager-form .btn-success:hover {
    background-color: #218838;
    border-color: #1e7e34;
}

.manager-form .form-group.text-center {
    text-align: center;
}
CSS;

$this->registerCss($css);
?>
