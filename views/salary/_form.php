<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Employee;

/* @var $this yii\web\View */
/* @var $model app\models\Salary */
/* @var $form yii\widgets\ActiveForm */

$employees = ArrayHelper::map(Employee::find()->where(['is_deleted' => 0])->all(), 'id', function ($model) {
    return $model->name . ' (' . $model->emp_id . ')';
});

$this->registerCss('
    .modern-form {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f7f7f7;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .modern-form h3 {
        margin-top: 20px;
        font-size: 1.5em;
        color: #333;
    }

    .modern-form .row {
        margin-bottom: 10px;
    }

    .modern-form label {
        font-weight: bold;
    }

    .modern-form input[type="text"],
    .modern-form input[type="number"],
    .modern-form select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 3px;
        box-sizing: border-box;
        margin-top: 5px;
    }

    .modern-form .btn-success {
        padding: 10px 20px;
        background-color: #4CAF50;
        border: none;
        color: white;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .modern-form .btn-success:hover {
        background-color: #45a049;
    }

    /* Optional: Add custom styles for specific elements */
    .modern-form .form-group {
        margin-bottom: 20px;
    }

    .modern-form .col-md-6 {
        width: 50%;
        float: left;
    }
');

?>

<div class="salary-form modern-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'employee_id')
                ->dropDownList(
                    $employees,
                    ['prompt' => 'Select Employee']
                )->label('Employee') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'date')->input("date", ['value' => $model->isNewRecord ? date('Y-m-d') : $model->date])->label('Date') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'basic_and_da')->textInput(['type' => 'number'])->label('Basic & DA') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'hra')->textInput(['type' => 'number'])->label('HRA') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'overtime')->textInput(['type' => 'number'])->label('Overtime') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'overtime_done')->textInput(['type' => 'number'])->label('Overtime Done') ?>
        </div>
    </div>

    <h3>Deductions</h3>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'contribution_to_pf')->textInput(['type' => 'number'])->label('Contribution to PF') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'esic')->textInput(['type' => 'number'])->label('ESIC') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'lwf')->textInput(['type' => 'number'])->label('LWF') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'salary_advance')->textInput(['type' => 'number', 'readonly' => true, 'id' => 'salary_advance_display'])->label('Salary Advance') ?>
            <?= $form->field($model, 'salary_advance')->hiddenInput(['id' => 'salary_advance'])->label(false) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'salary_advance_deducted')->textInput(['type' => 'number'])->label('Salary Advance Deducted') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'remaining_leaves')->textInput(['type' => 'number', 'readonly' => true, 'id' => 'remaining_leaves_display'])->label('Remaining Leaves') ?>
            <?= $form->field($model, 'remaining_leaves')->hiddenInput(['id' => 'remaining_leaves'])->label(false) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'leaves_taken')->textInput(['type' => 'number'])->label('Leaves Taken') ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$url = '"' . Yii::$app->request->baseUrl . '/salary/get-employee"';
$script = <<<JS
    $(document).ready(function() {
        // Fetch employee data using AJAX
        function fetchEmployeeData(employee_id) {
            $.ajax({
                url: $url,
                type: 'POST',
                data: { 'data': employee_id },
                success: function(val) {
                    var result = $.parseJSON(val);
                    var employee = result.data[0];

                    updateFormFields(employee);
                },
                error: function(xhr, status, error) {
                    console.log('Error fetching employee data:', error);
                }
            });
        }

        // Update form fields with employee data
        function updateFormFields(employee) {
            $('#salary-basic_and_da').val(parseInt(employee.basic_and_da));
            $('#salary-hra').val(parseInt(employee.hra));
            $('#salary-overtime').val(parseInt(employee.overtime));
            $('#salary-overtime_done').val(parseInt(employee.overtime_done));
            $('#salary-contribution_to_pf').val(parseInt(employee.contribution_to_pf));
            $('#salary-esic').val(parseInt(employee.esic));
            $('#salary-lwf').val(parseInt(employee.lwf));
            $('#salary-remaining_leaves').val(parseInt(employee.allowed_leaves));
            $('#remaining_leaves_display').val(parseInt(employee.allowed_leaves));
            $('#salary_advance').val(parseInt(employee.salary_advance));
            $('#salary_advance_display').val(parseInt(employee.salary_advance));
            $('#salary-salary_advance_deducted').val(0);
            $('#salary-leaves_taken').val(0);
        }

        // Event handler for employee dropdown change
        $('#salary-employee_id').change(function() {
            var employee_id = $(this).val();
            fetchEmployeeData(employee_id);
        });

        // Event handler for salary advance deduction
        $('#salary-salary_advance_deducted').keyup(function() {
            var advance = $('#salary_advance').val();
            var deducted = $(this).val();
            $('#salary_advance_display').val(parseInt(advance) - parseInt(deducted));
        });

        // Event handler for leaves taken calculation
        $('#salary-leaves_taken').keyup(function() {
            var remaining = parseInt($('#salary-remaining_leaves').val());
            var taken = parseInt($(this).val());

            if (taken === 1) {
                $('#remaining_leaves_display').val('');
            } else {
                var after_taken = remaining - taken;
                $('#remaining_leaves_display').val(after_taken < 0 ? 0 : after_taken);
            }
        });
    });
JS;
$this->registerJs($script);
?>

