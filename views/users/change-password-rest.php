<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
$this->title="Password Reset";
?>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="text-center mb-4">Reset Password</h2>
                    <div class="line mb-4"></div>

                    <?php if ($alert == 1) { ?>
                        <div class="alert alert-success" role="alert">Password changed successfully</div>
                    <?php } ?>

                    <?php $form = ActiveForm::begin(['id' => 'password-reset-form']); ?>

                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'New Password'])->label(false) ?>

                    <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Confirm Password'])->label(false) ?>

                    <div class="form-group">
                        <?= Html::submitButton('<span class="glyphicon glyphicon-ok"></span> Change Password', ['class' => 'btn btn-primary btn-block']) ?>
                    </div>

                    <?= $form->field($model, 'email')->hiddenInput()->label(false) ?>
                    <?= $form->field($model, 'username')->hiddenInput()->label(false) ?>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$script = <<< JS
$(document).ready(function(){
    setTimeout(() => {
        $(".alert-success").slideUp('fast');
    }, 10000);
});
JS;
$this->registerJs($script);
?>
<style>
    body {
        background-image: url('../images/bg3.jpg');
        background-size: cover;
        background-position: center;
        font-family: Arial, sans-serif;
    }

    .card {
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .line {
        width: 100%;
        height: 2px;
        background-color: #ccc;
        margin-bottom: 20px;
    }

    .alert-success {
        margin-bottom: 20px;
    }
</style>
