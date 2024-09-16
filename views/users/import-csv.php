<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Import CSV';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="users-import-csv">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please upload a CSV file to import users:</p>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'csvFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Import', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php if (!empty($message)) : ?>
        <div class="alert alert-info"><?= Html::encode($message) ?></div>
    <?php endif; ?>
</div>
