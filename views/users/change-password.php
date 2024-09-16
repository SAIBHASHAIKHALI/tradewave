<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="title">Change Password</div>
            <div class="content">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'password1')->passwordInput(['class' => 'form-control']) ?>

                <?= $form->field($model, 'password2')->passwordInput(['class' => 'form-control']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
