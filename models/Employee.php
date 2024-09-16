<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "employee".
 *
 * // ... (other properties and methods)
 */
class Employee extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'name', 'gender', 'designation', 'allowed_leaves', 'basic_and_da', 'hra', 'overtime', 'contribution_to_pf', 'esic', 'lwf', 'email', 'phone', 'address', 'birth_date', 'hire_dated', 'department_id', 'aadhar', 'pan', 'salary_advance', 'authorised_signatory', 'account_no'], 'required'],
            [['user_id', 'allowed_leaves', 'basic_and_da', 'hra', 'overtime', 'contribution_to_pf', 'esic', 'lwf', 'phone', 'department_id', 'aadhar', 'salary_advance', 'pf_applicable', 'medical_bill_submited', 'is_deleted'], 'integer'],
            [['birth_date', 'hire_dated', 'created_at', 'updated_at'], 'safe'],
            [['emp_id', 'designation', 'address'], 'string', 'max' => 100],
            [['name', 'email', 'authorised_signatory'], 'string', 'max' => 50],
            [['gender', 'pan'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['aadhar'], 'string', 'length' => [12, 20]], // assuming Aadhar is 12 digits long
            [['pan'], 'string', 'length' => [10, 20]], // assuming PAN is 10 characters long
            [['account_no'], 'string', 'max' => 15],
            ['phone', 'string', 'length' => 10],
            [['birth_date'], 'validateBirthDateNotExceedCurrentDate'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * Custom validator for birth_date to ensure it does not exceed the current date.
     */
    public function validateBirthDateNotExceedCurrentDate($attribute, $params)
    {
        $dateOfBirth = new \DateTime($this->$attribute);
        $today = new \DateTime();
        if ($dateOfBirth > $today) {
            $this->addError($attribute, 'The birth date cannot be in the future.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emp_id' => 'Emp ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'gender' => 'Gender',
            'designation' => 'Designation',
            'allowed_leaves' => 'Allowed Leaves',
            'basic_and_da' => 'Basic And Da',
            'hra' => 'Hra',
            'overtime' => 'Overtime',
            'contribution_to_pf' => 'Contribution To Pf',
            'esic' => 'Esic',
            'lwf' => 'Lwf',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'birth_date' => 'Birth Date',
            'hire_dated' => 'Hire Dated',
            'department_id' => 'Department ID',
            'aadhar' => 'Aadhar',
            'pan' => 'Pan',
            'salary_advance' => 'Salary Advance',
            'authorised_signatory' => 'Authorised Signatory',
            'pf_applicable' => 'Pf Applicable',
            'medical_bill_submited' => 'Medical Bill Submited',
            'account_no' => 'Account No',
            'is_deleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['user_id' => 'user_id']);
    }

    /**
     * Gets query for [[LeaveRequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeaveRequests()
    {
        return $this->hasMany(LeaveRequests::class, ['employee_id' => 'id']);
    }

    /**
     * Gets query for [[Salaries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalaries()
    {
        return $this->hasMany(Salary::class, ['employee_id' => 'id']);
    }
}
