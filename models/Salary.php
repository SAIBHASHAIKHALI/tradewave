<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salary".
 *
 * @property int $id
 * @property int $employee_id
 * @property int $basic_and_da
 * @property int $hra
 * @property int $overtime
 * @property int $overtime_done
 * @property int $contribution_to_pf
 * @property int $esic
 * @property int $lwf
 * @property int $salary_advance
 * @property int $salary_advance_deducted
 * @property int $remaining_leaves
 * @property int $leaves_taken
 * @property int $leaves_fine
 * @property int $total
 *
 * @property Employee $employee
 */
class Salary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id', 'basic_and_da', 'hra', 'overtime', 'contribution_to_pf', 'esic', 'lwf','date'], 'required'],
            [['employee_id', 'basic_and_da', 'hra', 'overtime', 'overtime_done', 'contribution_to_pf', 'esic', 'lwf', 'salary_advance', 'salary_advance_deducted', 'remaining_leaves', 'leaves_taken'], 'integer'],
            [['created_at','updated_at'],'safe'],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee',
            'date' => 'date',
            'basic_and_da' => 'Basic And Da',
            'hra' => 'Hra',
            'overtime' => 'Overtime Paid By Hour',
            'overtime_done' => 'Overtime Done In Hours',
            'contribution_to_pf' => 'Contribution To Pf',
            'esic' => 'Esic',
            'lwf' => 'Lwf',
            'salary_advance' => 'Salary Advance',
            'salary_advance_deducted' => 'Salary Advance Deducted',
            'remaining_leaves' => 'Remaining Leaves',
            'leaves_taken' => 'Leaves Taken This Month',
        ];
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }
}
