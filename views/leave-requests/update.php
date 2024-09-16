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
?>

<div class="leave-requests-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'employee_id')->dropDownList($employees, ['prompt' => 'Select Employee']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'leave_type_id')->dropDownList($leaveTypes, ['prompt' => 'Select Leave Type']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'start_date')->widget(\yii\widgets\MaskedInput::class, [
                'mask' => '9999-99-99',
                'clientOptions' => ['alias' => 'yyyy-mm-dd']
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'end_date')->widget(\yii\widgets\MaskedInput::class, [
                'mask' => '9999-99-99',
                'clientOptions' => ['alias' => 'yyyy-mm-dd']
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'status')->dropDownList([ 
                'pending' => 'Pending', 
                'approved' => 'Approved', 
                'rejected' => 'Rejected', 
            ], ['prompt' => 'Select Status']) ?>
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
