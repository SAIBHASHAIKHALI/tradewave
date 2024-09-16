<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchEmployee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'emp_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'designation') ?>

    <?php // echo $form->field($model, 'allowed_leaves') ?>

    <?php // echo $form->field($model, 'basic_and_da') ?>

    <?php // echo $form->field($model, 'hra') ?>

    <?php // echo $form->field($model, 'overtime') ?>

    <?php // echo $form->field($model, 'contribution_to_pf') ?>

    <?php // echo $form->field($model, 'esic') ?>

    <?php // echo $form->field($model, 'lwf') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'birth_date') ?>

    <?php // echo $form->field($model, 'hire_dated') ?>

    <?php // echo $form->field($model, 'department_id') ?>

    <?php // echo $form->field($model, 'aadhar') ?>

    <?php // echo $form->field($model, 'pan') ?>

    <?php // echo $form->field($model, 'salary_advance') ?>

    <?php // echo $form->field($model, 'authorised_signatory') ?>

    <?php // echo $form->field($model, 'pf_applicable') ?>

    <?php // echo $form->field($model, 'medical_bill_submited') ?>

    <?php // echo $form->field($model, 'account_no') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
