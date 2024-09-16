<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style>
/* General form container styling */
.departments-form {
    max-width: 600px;
    margin: 0 auto;
    padding: 2rem;
    background-color: #f7f7f9;
    border-radius: 1rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

/* Input and textarea styling */
.departments-form .form-control {
    border-radius: 0.75rem;
    border: none;
    background: #e9ecef;
    padding: 1rem;
    font-size: 1rem;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.departments-form .form-control:focus {
    background: #ffffff;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
    outline: none;
}

/* Label styling */
.departments-form .form-label {
    font-size: 1rem;
    font-weight: 600;
    color: #495057;
    margin-bottom: 0.5rem;
}

/* Button styling */
.departments-form .btn-success {
    background-color: #28a745;
    border-color: #28a745;
    border-radius: 0.75rem;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    font-weight: bold;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.departments-form .btn-success:hover {
    background-color: #218838;
    box-shadow: 0 10px 20px rgba(40, 167, 69, 0.3);
}

@media (max-width: 576px) {
    .departments-form {
        padding: 1rem;
    }

    .departments-form .form-control, .departments-form .btn-success {
        font-size: 0.9rem;
        padding: 0.65rem;
    }
}
</style>