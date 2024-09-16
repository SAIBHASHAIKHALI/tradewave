<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Employee;
use app\models\LeaveTypes;

$employees = Employee::find()->select(['name', 'id'])->indexBy('id')->column();
$leaveTypes = LeaveTypes::find()->select(['name', 'id'])->indexBy('id')->column();

/* @var $this yii\web\View */
/* @var $model app\models\LeaveRequests */
/* @var $form yii\widgets\ActiveForm */
/* @var $employees array */
/* @var $leaveTypes array */

$this->title = 'Create Leave Request'
?>

<div class="leave-requests-form">

<h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'employee_id')->dropDownList($employees, ['prompt' => 'Select Employee'])->label('Employee Name') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'leave_type_id')->dropDownList($leaveTypes, ['prompt' => 'Select Leave Type']) ?>
        </div>
    </div>
    <div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'start_date')->input('date', ['class' => 'form-control']) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'end_date')->input('date', ['class' => 'form-control']) ?>
    </div>
</div>

   

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'reason')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
