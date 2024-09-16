<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Salary */

$this->title = $model->employee->name;

\yii\web\YiiAsset::register($this);


$overtime = 0;

if ($model->overtime_done > 0) {
    $overtime = $model->overtime_done*$model->overtime;
} else {
    $overtime = 0;
}

$leaves_fine = 0 ;

if ($model->remaining_leaves < 0){
    $leaves_fine = ($model->basic_and_da + $model->hra) / 30 * $model->leaves_taken ;
}else{
    $leaves_fine = 0 ;
}

$total_gross_salary = $model->basic_and_da + $model->hra + $overtime;
$total_deduction = $model-> contribution_to_pf + $model->esic + $model->lwf + $model->salary_advance_deducted + $leaves_fine ;




?>
<div class="salary-view">


    <!-- <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <!-- <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'employee_id',
            'date',
            'basic_and_da',
            'hra',
            'overtime',
            'overtime_done',
            'contribution_to_pf',
            'esic',
            'lwf',
            'salary_advance',
            'salary_advance_deducted',
            'remaining_leaves',
            'leaves_taken',
            'leaves_fine',
        ],
    ]) ?> -->


    <div class="">
        <div class="pull-right">
            <button class="btn btn-primary  " id="print_btn">
                <i class="fa fa-print" aria-hidden="true"></i>

            </button>
        </div>
        <div class="row">

            <div class="col-md-12">
                <h2>
                     Saibha's Artscript
                </h2>
                <p><b>Salary Pay Slip For The Month Of <?php echo date("F Y", strtotime($model->date)) ?></b></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped"> 
                    <tr>
                        <td>
                            <b>Name</b>    
                        </td>
                        <td>
                            <b>Designation</b>    
                        </td>
                        <td>
                            <b>Salary Advance Remaining</b> 
                        </td>
                        <td>
                            <b>Leaves Remaining</b> 
                        </td>
                        <td>
                            <b>Leaves Taken This Month</b> 
                        </td>
                        <td>
                            <b>Overtime Done In Hours</b> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                echo $model->employee->name;
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $model->employee->designation;
                            ?>
                        </td>
                        <td>
                             
                            <?php echo number_format($model->salary_advance) ?> 
                        </td>
                        </td>
                        <td>
                            <?php
                                echo $model->remaining_leaves;
                            ?> 
                        </td>
                        <td>
                            <?php
                                echo $model->leaves_taken;
                            ?> 
                        </td>
                        <td>
                            <?php
                                echo $model->overtime_done;
                            ?> 
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped"> 
                    <tr>
                        <td>
                            Basic Payment And DA    
                        </td>
                        <td>
                            <?php
                                echo number_format($model->basic_and_da);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            House Rent Allowance    
                        </td>
                        <td>
                            <?php
                                echo number_format($model->hra);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Overtime    
                        </td>
                        <td>
                            <?php
                               echo number_format($overtime);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Total Gross Salary</b>
                        </td>

                        <td>
                            <?php
                                echo number_format($total_gross_salary);
                            ?>  
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                                <b>Deductions</b>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            Contribution To PF
                        </td>

                        <td>
                            <?php
                                echo number_format($model->contribution_to_pf);
                            ?>  
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Esic
                        </td>

                        <td>
                            <?php
                                echo number_format($model->esic);
                            ?>  
                        </td>
                    </tr>
                    <tr>
                        <td>
                            LWF
                        </td>

                        <td>
                            <?php
                                echo number_format($model->lwf);
                            ?>  
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Salary Advance Deducted
                        </td>

                        <td>
                            <?php
                                echo number_format($model->salary_advance_deducted);
                            ?>  
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Extended Leaves Fine
                        </td>

                        <td>
                            <?php
                                echo number_format($leaves_fine);
                            ?>  
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Total Deductions</b>
                        </td>

                        <td>
                            <?php
                                echo number_format($total_deduction);
                            ?>  
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Total Salary After Deduction</b>
                        </td>

                        <td>
                            <?php
                                echo number_format($total_gross_salary-$total_deduction);
                            ?>  
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        



    </div>


</div>
<?php
$script = <<<JS
        
        $('#print_btn').click(function(){
            console.log('print')
            $('#print_btn').css('display','none')
            setTimeout(function(){ 
                $('#print_btn').css('display','block')
                    },
                500); 
            print()
        })


JS;
$this->registerJS($script);
?>