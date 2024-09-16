<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group'],
    'inputTemplate' => "{input}"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group'],
    'inputTemplate' => "{input}"
];
?>
<div class="login-container">
    <canvas id="animatedCanvas"></canvas>
    <div class="login-box">
        <div class="login-logo text-center">
            <a href="#" class="login-box-msg"><b>TradeWave</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

            <?= $form
                ->field($model, 'username', $fieldOptions1)
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('username'), 'class' => 'form-control', 'autofocus' => true, 'id' => 'username-input']) ?>

            <?= $form
                ->field($model, 'password', $fieldOptions2)
                ->label(false)
                ->passwordInput(['placeholder' => $model->getAttributeLabel('password'), 'class' => 'form-control']) ?>

            <!-- New Buttons to auto-fill username -->
            <div class="role-buttons text-center">
                <button type="button" class="btn btn-secondary" onclick="fillUsername('Admin')">Admin</button>
                <button type="button" class="btn btn-secondary" onclick="fillUsername('HR')">HR</button>
                <button type="button" class="btn btn-secondary" onclick="fillUsername('Employee')">Employee</button>
                <button type="button" class="btn btn-secondary" onclick="fillUsername('Accountant')">Accountant</button>
            </div>

            <div class="row" style="margin-top: 15px;">
                <div class="col-xs-8">
                    <?= $form->field($model, 'rememberMe')->checkbox(['class' => 'custom-checkbox']) ?>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                </div>
                <!-- /.col -->
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
</div>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<script>
    window.onload = function() {
        var canvas = document.getElementById("animatedCanvas");
        var context = canvas.getContext("2d");
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        var particles = [];
        var numParticles = 200;

        function createParticles() {
            for (var i = 0; i < numParticles; i++) {
                particles.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height,
                    size: Math.random() * 4 + 1,
                    speedX: Math.random() * 2 - 1,
                    speedY: Math.random() * 2 - 1
                });
            }
        }

        function animateParticles() {
            context.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(particle => {
                context.beginPath();
                context.arc(particle.x, particle.y, particle.size, 0, Math.PI * 2);
                context.fillStyle = "rgba(255, 255, 255, 0.6)";
                context.fill();
                context.closePath();

                particle.x += particle.speedX;
                particle.y += particle.speedY;

                if (particle.x > canvas.width || particle.x < 0) particle.speedX *= -1;
                if (particle.y > canvas.height || particle.y < 0) particle.speedY *= -1;
            });

            requestAnimationFrame(animateParticles);
        }

        createParticles();
        animateParticles();
    }

    // JavaScript function to fill the username field
    function fillUsername(role) {
        document.getElementById('username-input').value = role;
    }
</script>

<style>
    /* General Styles */
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        overflow: hidden;
        background-color: #f4f6f9;
    }

    .login-container {
        position: relative;
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1;
    }

    .login-box {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        padding: 40px;
        max-width: 400px;
        width: 100%;
        z-index: 2;
    }

    .login-logo a {
        color: #333;
        font-size: 36px;
        font-weight: 700;
        text-decoration: none;
        letter-spacing: 2px;
        text-transform: uppercase;
        background: linear-gradient(45deg, #007bff, #00d084);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .login-box-body {
        padding: 0;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ddd;
        box-shadow: none;
        padding: 12px 15px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        outline: none;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 8px;
        padding: 12px;
        font-weight: 600;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-secondary {
        margin: 5px;
        padding: 10px 20px;
        background-color: #6c757d;
        border-color: #6c757d;
        color: #fff;
        border-radius: 5px;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    .custom-checkbox {
        font-size: 14px;
    }

    .custom-checkbox input[type="checkbox"] {
        position: relative;
        top: 1px;
    }

    .custom-checkbox label {
        font-weight: normal;
        padding-left: 1.5em;
    }

    canvas {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 0;
    }
</style>
