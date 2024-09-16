<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'emp_id',
            'user_id',
            'name',
            'gender',
            'designation',
            'allowed_leaves',
            'basic_and_da',
            'hra',
            'overtime:datetime',
            'contribution_to_pf',
            'esic',
            'lwf',
            'email:email',
            'phone',
            'address',
            'birth_date',
            'hire_dated',
            'department_id',
            'aadhar',
            'pan',
            'salary_advance',
            'authorised_signatory',
            'pf_applicable',
            'medical_bill_submited',
            'account_no',
            'is_deleted',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
