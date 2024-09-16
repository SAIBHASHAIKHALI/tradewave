<?php
use app\models\Users;
use app\models\Department;
use app\models\Departments;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */

$this->registerCss("
    .employee-form {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .employee-form .form-group {
        margin-bottom: 15px;
    }
    .employee-form .form-group label {
        font-weight: bold;
    }
    .employee-form .form-control {
        border-radius: 0;
        box-shadow: none;
        border-color: #ced4da;
    }
    .employee-form .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        border-radius: 0;
    }
    .employee-form h3 {
        border-bottom: 1px solid #dee2e6;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }
    .employee-form .row {
        margin-bottom: 15px;
    }
        .employee-form .form-group.has-error .help-block {
    display: block;
    color: #a94442; /* Error message color */
}

");

?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'emp_id')->textInput() ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'user_id')->dropDownList(
                \yii\helpers\ArrayHelper::map(Users::find()->all(), 'user_id', 'username'),
                ['prompt' => 'Select User']
            ) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'birth_date')->input('date') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'hire_dated')->input('date') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'department_id')->dropDownList(
                \yii\helpers\ArrayHelper::map(Departments::find()->all(), 'id', 'name'),
                ['prompt' => 'Select Department']
            ) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'aadhar')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'pan')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'gender')->dropDownList(
                ['Male' => 'Male', 'Female' => 'Female'],
                ['prompt' => 'Select Gender']
            ); ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'designation')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'allowed_leaves')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'basic_and_da')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'hra')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'overtime')->textInput() ?>
        </div>
    </div>

    <h3>Deductions</h3>
    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'contribution_to_pf')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'esic')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'lwf')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'salary_advance')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'authorised_signatory')->textInput() ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'account_no')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, "pf_applicable")->checkbox(['value' => 1]); ?>

    <?= $form->field($model, "medical_bill_submited")->checkbox(['value' => 1]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<<JS
$(document).ready(function() {
    var basic_and_da = $('#employee-basic_and_da');
    var hra = $('#employee-hra');
    
    function updateOvertime() {
        var overtime = Math.round(
            (parseInt(basic_and_da.val()) || 0 + parseInt(hra.val()) || 0) / 30 / 8 * 2
        );
        $('#employee-overtime').val(overtime);
    }

    basic_and_da.keyup(updateOvertime);
    hra.keyup(updateOvertime);

    function generateEmployeeId() {
        var randomNumber = Math.floor(Math.random() * 9000) + 1000;
        return 'EMP' + randomNumber;
    }

    $('#employee-name').on('input', function() {
        var empId = generateEmployeeId();
        $('#employee-emp_id').val(empId);
    });

    $('#{$form->id}').on('reset', function() {
        $('#employee-emp_id').val('');
    });

    $(document).ready(function() {
    $('#employee-birth_date').on('change', function() {
        var birthDate = new Date($(this).val());
        var today = new Date();

        var errorMsg = '';
        var isValid = true;

        if (birthDate > today) {
            errorMsg = 'The birth date cannot be in the future.';
            isValid = false;
        }

        if (!isValid) {
            $(this).closest('.form-group').addClass('has-error');
            $(this).next('.help-block').text(errorMsg).show();
        } else {
            $(this).closest('.form-group').removeClass('has-error');
            $(this).next('.help-block').text('').hide();
        }
    });
});




JS;
$this->registerJS($script);
?>
