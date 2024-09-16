<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'basic_and_da') ?>

    <?= $form->field($model, 'hra') ?>

    <?= $form->field($model, 'overtime') ?>

    <?php // echo $form->field($model, 'overtime_done') ?>

    <?php // echo $form->field($model, 'contribution_to_pf') ?>

    <?php // echo $form->field($model, 'esic') ?>

    <?php // echo $form->field($model, 'lwf') ?>

    <?php // echo $form->field($model, 'salary_advance') ?>

    <?php // echo $form->field($model, 'salary_advance_deducted') ?>

    <?php // echo $form->field($model, 'remaining_leaves') ?>

    <?php // echo $form->field($model, 'leaves_taken') ?>

    <?php // echo $form->field($model, 'leaves_fine') ?>

    <?php // echo $form->field($model, 'total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
