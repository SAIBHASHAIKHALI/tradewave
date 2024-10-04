<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Employee;
use app\models\LeaveTypes;

$userId = Yii::$app->user->id; // Get the user ID from Yii's user component

// Fetch the employee linked to the logged-in user
$employee = Employee::find()->where(['user_id' => $userId])->one();

// Fetch all leave types
$leaveTypes = LeaveTypes::find()->select(['name', 'id'])->indexBy('id')->column();

/* @var $this yii\web\View */
/* @var $model app\models\LeaveRequests */
/* @var $form yii\widgets\ActiveForm */
/* @var $leaveTypes array */
?>

<div class="leave-requests-form">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>

    <!-- Automatically set employee_id as a hidden field if employee exists -->
    <?php if ($employee): ?>
        <?= $form->field($model, 'employee_id')->hiddenInput(['value' => $employee->id])->label(false) ?>
        <div class="form-group">
            <label class="col-md-4 control-label">Employee Name</label>
            <div class="col-md-8">
                <p class="form-control-static"><?= Html::encode($employee->name) ?></p>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">
            Employee information not found. Please contact the administrator.
        </div>
    <?php endif; ?>

    <div class="form-group">
        <?= $form->field($model, 'leave_type_id')->dropDownList($leaveTypes, ['prompt' => 'Select Leave Type', 'class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'start_date')->widget(\yii\jui\DatePicker::class, [
            'options' => ['class' => 'form-control'],
            'dateFormat' => 'yy-mm-dd',
            'clientOptions' => [
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '1900:2099',
            ],
        ]) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'end_date')->widget(\yii\jui\DatePicker::class, [
            'options' => ['class' => 'form-control'],
            'dateFormat' => 'yy-mm-dd',
            'clientOptions' => [
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '1900:2099',
            ],
        ]) ?>
    </div>

   

    <div class="form-group">
        <?= $form->field($model, 'reason')->textarea(['rows' => 6, 'class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!-- Custom Styles for Form -->
<style>
    .leave-requests-form {
        margin: 20px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-horizontal .form-group {
        margin-right: 0;
        margin-left: 0;
    }

    .form-horizontal .control-label {
        text-align: right;
        padding-top: 7px;
    }

    .form-horizontal .form-control-static {
        padding: 7px 12px;
        background-color: #e9ecef;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .form-control {
        border-radius: 4px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: #fff;
        font-size: 16px;
        padding: 10px;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .alert-warning {
        background-color: #fff3cd;
        border-color: #ffeeba;
        color: #856404;
        padding: 15px;
        border-radius: 4px;
    }
</style>
