<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

$this->title = "Mark Responses";
?>
<?php $form = ActiveForm::begin([
                'method' => 'get',
            ]); ?>
<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
<div class="row">
    
 


    

   
    <?php ActiveForm::end(); ?>
</div>
<table class="table table-hover">
    <tr class="table table-info">
        <th>Sr. No</th>
        <th>Name</th>
        <th>USN</th>
        <th>Email Id</th>
        <th>Batch</th>
       
    
    </tr>

    <tr>
    <?php 
  
        $models = $dataProvider->getModels();
        foreach ($models as $key => $model) {

            
           
            
           
           
     
            echo '<tr>
                <td>'. ($key + 1) .'</td>
                <td>'. $model->username .'</td>
                <td>'. $model->usn .'</td>
                <td>'. $model->email .'</td>
                <td>'. $model->batch .'</td>
               
       
       
            </tr>';
        }
  
    ?>
    </tr>
    
    
</table>
<div class="pagination-container">
        <?= \yii\widgets\LinkPager::widget([
            'pagination' => $dataProvider->pagination,
            'options' => ['class' => 'pagination justify-content-center']
        ]); ?>
    </div>



<style>

.pagination-container {
    margin-top: 20px;
}

.pagination {
    display: flex;
    list-style: none;
    padding: 0;
}

.pagination li {
    margin-right: 5px;
}

.pagination a {
    display: inline-block;
    padding: 5px 10px;
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    color: #007bff;
    text-decoration: none;
    border-radius: 3px;
}

.pagination a:hover {
    background-color: #e9ecef;
}

.pagination .active a {
    background-color: #007bff;
    color: #fff;
}

</style>