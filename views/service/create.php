<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Name Field -->
    <div class="mb-3">
        <?= $form->field($model, 'name')->textInput([
            'maxlength' => true, 
            'class' => 'form-control'
        ])->label('Service Name', ['class' => 'form-label']) ?>
    </div>

    <!-- Type Field -->
    <div class="mb-3">
    <?= $form->field($model, 'type')->dropDownList([
            'Full Stack' => 'Full Stack',
            'Cyber Security' => 'Cyber Security',
            'Android App' => 'Android App',
            'IOS App' => 'IOS App',
        ], [
            'prompt' => 'Select Domain',
            'class' => 'form-select'
        ])->label('Domain', ['class' => 'form-label']) ?>
    </div>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => yii::$app->user->identity->user_id])->label(false); ?>




    <!-- Domain Dropdown -->
 

    <!-- Submit Button -->
    <div class="form-group mt-4">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary w-100']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style>
/* Container for the form */
.service-form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Form labels */
.form-label {
    font-weight: 600;
    font-size: 1rem;
    color: #333;
    margin-bottom: 8px;
}

/* Input fields */
.form-control {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    margin-bottom: 20px;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #1B5FC1;
    outline: none;
    box-shadow: 0 0 5px rgba(27, 95, 193, 0.2);
}

/* Submit button */
.btn-primary {
    background-color: #1B5FC1;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%;
    font-size: 1rem;
}

.btn-primary:hover {
    background-color: #14468b;
}
/* Dropdown styling */
.form-select {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    transition: border-color 0.3s ease;
}

.form-select:focus {
    border-color: #1B5FC1;
    outline: none;
    box-shadow: 0 0 5px rgba(27, 95, 193, 0.2);
}

</style>