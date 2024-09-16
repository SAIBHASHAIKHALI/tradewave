<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employee;

/**
 * SearchEmployee represents the model behind the search form of `app\models\Employee`.
 */
class SearchEmployee extends Employee
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'allowed_leaves', 'basic_and_da', 'hra', 'overtime', 'contribution_to_pf', 'esic', 'lwf', 'phone', 'department_id', 'aadhar', 'salary_advance', 'pf_applicable', 'medical_bill_submited', 'is_deleted'], 'integer'],
            [['emp_id', 'name', 'gender', 'designation', 'email', 'address', 'birth_date', 'hire_dated', 'pan', 'authorised_signatory', 'account_no', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Employee::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'allowed_leaves' => $this->allowed_leaves,
            'basic_and_da' => $this->basic_and_da,
            'hra' => $this->hra,
            'overtime' => $this->overtime,
            'contribution_to_pf' => $this->contribution_to_pf,
            'esic' => $this->esic,
            'lwf' => $this->lwf,
            'phone' => $this->phone,
            'birth_date' => $this->birth_date,
            'hire_dated' => $this->hire_dated,
            'department_id' => $this->department_id,
            'aadhar' => $this->aadhar,
            'salary_advance' => $this->salary_advance,
            'pf_applicable' => $this->pf_applicable,
            'medical_bill_submited' => $this->medical_bill_submited,
            'is_deleted' => $this->is_deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'emp_id', $this->emp_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'designation', $this->designation])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'pan', $this->pan])
            ->andFilterWhere(['like', 'authorised_signatory', $this->authorised_signatory])
            ->andFilterWhere(['like', 'account_no', $this->account_no]);

        return $dataProvider;
    }
}
