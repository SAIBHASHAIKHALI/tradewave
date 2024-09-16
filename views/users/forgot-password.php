<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "Forgot Password";

// Custom CSS styles for the form
$this->registerCss("
     body {
        background-image: url('../images/bg3.jpg');
        background-size: cover;
        background-position: center;
        font-family: Arial, sans-serif;
    }

    .login-container {
        margin-top: 100px;
        max-width: 400px;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .form-control {
        background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid #ccc;
        color: #333;
        border-radius: 4px;
        box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
    }
    .btn-reset {
        background-color: #2196F3;
        color: #ffffff;
        border: 1px solid #2196F3;
        width: 100%;
        transition: background-color 0.3s, border-color 0.3s;
    }
    .btn-reset:hover {
        background-color: #0d8bff;
        border-color: #0d8bff;
    }
    .alert {
        margin-top: 15px;
    }
");

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-container">
                <h2 class="text-center mb-4">Forgot Password</h2>

                <?php $form = ActiveForm::begin(); ?>

                <p><b>Email ID: </b></p><input class="form-control" type="email" name="email"><br>

                <div class="form-group">
                    <?= Html::submitButton('Reset Password', ['class' => 'btn btn-reset']) ?>
                </div>

                <?php ActiveForm::end(); ?>

                <?php if ($alert === 1): ?>
                    <div class="alert alert-danger" role="alert">Error: The email ID entered is not a valid user. Please
                        check the entered email.</div>
                <?php elseif ($alert === 2): ?>
                    <div class="alert alert-success" role="alert">Success: A unique URL has been sent to your registered
                        email ID to reset the password. The link will be valid only for 15 minutes.</div>
                <?php elseif ($alert === 3): ?>
                    <div class="alert alert-danger" role="alert">Error: A unique URL has already been sent to your
                        registered email ID to reset the password. The link will be valid only for 15 minutes.</div>
                <?php elseif ($alert === 4): ?>
                    <div class="alert alert-danger" role="alert">Error: Something went wrong.</div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>