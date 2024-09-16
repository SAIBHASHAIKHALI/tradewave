<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "leave_requests".
 *
 * @property int $id
 * @property int|null $employee_id
 * @property int|null $leave_type_id
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $status
 * @property string|null $reason
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property LeaveTypes $leaveType
 * @property Employee $employee
 */
class LeaveRequests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leave_requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id', 'leave_type_id'], 'integer'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['reason'], 'string'],
            [['leave_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => LeaveTypes::className(), 'targetAttribute' => ['leave_type_id' => 'id']],
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
            'employee_id' => 'Employee ID',
            'leave_type_id' => 'Leave Type ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'status' => 'Status',
            'reason' => 'Reason',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[LeaveType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeaveType()
    {
        return $this->hasOne(LeaveTypes::className(), ['id' => 'leave_type_id']);
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
