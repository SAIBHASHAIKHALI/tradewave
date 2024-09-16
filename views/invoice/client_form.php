<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Manager;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $client app\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-form">
    <?php
    $this->registerJs(
        '$("document").ready(function(){ 
            $("#new_country").on("pjax:end", function() {
                $.pjax.reload({container:"#countries"});  
                $("#modal-id").modal("hide");
            });
        });'
    );
    ?>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php Pjax::begin(['id' => 'new_country']) ?>
            <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>

            <?= $form->field($client, 'companyname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($client, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($client, 'phonenumber')->textInput(['maxlength' => true]) ?>

            <?= $form->field($client, 'manager_id')->dropDownList(
                \yii\helpers\ArrayHelper::map(Manager::find()->orderBy('name')->all(), 'manager_id', 'name'),
                ['prompt' => 'Select a manager...']
            ) ?>

            <div class="form-group">
                <?= Html::submitButton('<span class=\'glyphicon glyphicon-ok\'> </span> Save', ['class' => 'btn btn-default']) ?>
            </div>

            <?php ActiveForm::end(); ?>
            <?php Pjax::end() ?>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>