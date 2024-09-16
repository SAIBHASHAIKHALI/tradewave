<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
/* Styling for the file input */
.custom-file-input {
    position: relative;
    display: inline-block;
    width: 100%; /* Adjust width to fit within the form */
}

.custom-file-input input[type="file"] {
    font-size: 100px;
    position: absolute;
    top: 0;
    right: 0;
    opacity: 0;
    cursor: pointer;
    width: 100%; /* Full width of the parent container */
    height: 100%; /* Full height of the parent container */
}



.custom-file-input:hover::before {
    background-color: #0056b3; /* Hover background color */
    border-color: #0056b3; /* Hover border color */
}

.custom-file-input:active::before {
    background-color: #004380; /* Active background color */
    border-color: #004380; /* Active border color */
}

/* Styling for the form container */
.users-form {
    max-width: 800px;
    margin: 2rem auto; /* Centering and margin */
    padding: 2rem;
    background-color: #f9f9f9; /* Light background color */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Styling for form fields */
.users-form .form-control {
    border-radius: 0.5rem;
    border: 1px solid #ced4da;
    font-size: 1rem;
    padding: 0.75rem;
    margin-bottom: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.users-form .form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

/* Styling for the submit button */
.users-form .btn-success {
    background-color: #28a745;
    border: none;
    border-radius: 0.5rem;
    padding: 0.5rem 1rem; /* Reduced padding */
    font-size: 0.875rem; /* Smaller font size */
    font-weight: bold;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.users-form .btn-success:hover {
    background-color: #218838;
    box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
}

/* Styling for labels */
.users-form .form-label {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
    color: #495057;
}

</style>

<div class="users-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'class' => 'form-horizontal']]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'class' => 'form-control']) ?>

 

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>

    <div class="form-group">
        <?= $form->field($model, 'image')->fileInput(['class' => 'custom-file-input'])->label("Upload Profile Picture") ?>
    </div>

    <?= $form->field($model, 'level')->dropDownList(['1' => 'Admin',  '2' => 'Accountant','3'=>'HR','4'=>'Employee'], ['class' => 'form-control']) ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
