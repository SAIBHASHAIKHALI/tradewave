<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property string $uniqueid
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $birth_date
 * @property string $hire_date
 * @property int|null $department_id
 * @property float|null $salary
 * @property string $aadhar
 * @property string $pan
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Departments $department
 * @property LeaveRequests[] $leaveRequests
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'hire_date', 'aadhar', 'pan'], 'required'],
            [['birth_date', 'hire_date', 'created_at', 'updated_at'], 'safe'],
            [['department_id'], 'integer'],
            [['salary'], 'number'],
            [['uniqueid', 'email'], 'string', 'max' => 100],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 255],
            [['aadhar'], 'string', 'length' => 12],
            [['pan'], 'string', 'length' => 10],
            [['email','pan','aadhar','phone'], 'unique'],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }
    

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uniqueid' => 'Uniqueid',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'birth_date' => 'Birth Date',
            'hire_date' => 'Hire Date',
            'department_id' => 'Department ID',
            'salary' => 'Salary',
            'aadhar' => 'Aadhar',
            'pan' => 'Pan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Departments::className(), ['id' => 'department_id']);
    }

    /**
     * Gets query for [[LeaveRequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeaveRequests()
    {
        return $this->hasMany(LeaveRequests::className(), ['employee_id' => 'id']);
    }
}