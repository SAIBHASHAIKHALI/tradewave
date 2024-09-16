<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Manager;

/* @var $this yii\web\View */
/* @var $model app\models\Client */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="client-form container my-5 p-5 bg-light rounded shadow-lg">

    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'p-4 bg-white rounded shadow-sm'
        ],
    ]); ?>

    <h2 class="text-center mb-4 text-primary" style="font-size: 2rem;">Client Information</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-5">
                <?= $form->field($model, 'companyname')->textInput([
                    'maxlength' => true,
                    'class' => 'form-control form-control-lg',
                    'style' => 'font-size: 1.25rem; padding: 1.25rem;',
                    'placeholder' => 'Enter company name'
                ])->label('Company Name', ['class' => 'form-label font-weight-bold text-dark', 'style' => 'font-size: 1.5rem;']) ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-5">
                <?= $form->field($model, 'email')->textInput([
                    'maxlength' => true,
                    'class' => 'form-control form-control-lg',
                    'style' => 'font-size: 1.25rem; padding: 1.25rem;',
                    'placeholder' => 'Enter email address'
                ])->label('Email', ['class' => 'form-label font-weight-bold text-dark', 'style' => 'font-size: 1.5rem;']) ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-5">
                <?= $form->field($model, 'phonenumber')->textInput([
                    'class' => 'form-control form-control-lg',
                    'style' => 'font-size: 1.25rem; padding: 1.25rem;',
                    'placeholder' => 'Enter phone number'
                ])->label('Phone Number', ['class' => 'form-label font-weight-bold text-dark', 'style' => 'font-size: 1.5rem;']) ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-5">
                <?= $form->field($model, 'manager_id')->dropDownList(
                    \yii\helpers\ArrayHelper::map(Manager::find()->orderBy('name')->all(), 'manager_id', 'name'),
                    [
                        'prompt' => 'Select a manager...',
                        'class' => 'form-control form-control-lg',
                        'style' => 'font-size: 1.25rem; padding: 1.25rem;',
                        'onchange' => 'showManagerDetails(this.value)'
                    ]
                )->label('Assigned Manager', ['class' => 'form-label font-weight-bold text-dark', 'style' => 'font-size: 1.5rem;']) ?>
            </div>
        </div>
    </div>

    <!-- Manager details container -->
    <div id="manager-details" class="bg-light p-4 rounded shadow-sm mb-5" style="display: none; font-size: 1.25rem;">
        <!-- Manager details will be dynamically inserted here -->
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton('Save Client', [
            'class' => 'btn btn-lg btn-primary px-5 py-3 font-weight-bold shadow',
            'style' => 'font-size: 1.5rem;'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <script>
        function showManagerDetails(managerId) {
            var managerDetails = document.getElementById('manager-details');

            if (managerId && managerDetails) {
                var managers = <?= json_encode(Manager::find()->asArray()->all()) ?>;
                var selectedManager = managers.find(function(manager) {
                    return manager.manager_id == managerId;
                });

                if (selectedManager) {
                    managerDetails.innerHTML = `
                        <h5 class="font-weight-bold text-dark">${selectedManager.name}</h5>
                        <p class="text-muted"><strong>Email:</strong> ${selectedManager.email}</p>
                        <p class="text-muted"><strong>Contact:</strong> ${selectedManager.phonenumber}</p>
                        <p class="text-muted"><strong>Address:</strong> ${selectedManager.address}</p>
                    `;
                    managerDetails.style.display = 'block';
                } else {
                    managerDetails.innerHTML = ''; // Clear manager details if managerId is not found
                    managerDetails.style.display = 'none';
                }
            }
        }
    </script>

</div>

<style>
/* General form styling */
.client-form {
    background-color: #f4f6f9;
    border-radius: 12px;
}

.client-form .form-control {
    background-color: #f7f9fc;
    border: 2px solid #ced4da;
    border-radius: 0.75rem;
    font-size: 1.25rem;
    padding: 1.25rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.client-form .form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.client-form .form-label {
    font-size: 1.5rem;
    color: #495057;
}

.client-form .btn-primary {
    background-color: #007bff;
    border: none;
    border-radius: 50px;
    padding: 0.9rem 2rem;
    font-size: 1.5rem;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.client-form .btn-primary:hover {
    background-color: #0056b3;
    box-shadow: 0 10px 20px rgba(0, 123, 255, 0.3);
}

/* Manager details container */
#manager-details {
    background-color: #ffffff;
    padding: 1.5rem;
    border-radius: 0.75rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    margin-top: 1.5rem;
}

#manager-details h5 {
    font-size: 1.4rem;
    margin-bottom: 0.75rem;
}

#manager-details p {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
    color: #6c757d;
}

@media (max-width: 576px) {
    .client-form {
        padding: 1.5rem;
    }
}
</style>
