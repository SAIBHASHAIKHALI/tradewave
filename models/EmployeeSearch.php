<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form of `app\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'allowed_leaves', 'basic_and_da', 'hra', 'overtime', 'contribution_to_pf', 'esic', 'lwf', 'salary_advance', 'authorised_signatory', 'pf_applicable', 'medical_bill_submited', 'account_no'], 'integer'],
            [['name', 'gender', 'designation'], 'safe'],
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
            'allowed_leaves' => $this->allowed_leaves,
            'basic_and_da' => $this->basic_and_da,
            'hra' => $this->hra,
            'overtime' => $this->overtime,
            'contribution_to_pf' => $this->contribution_to_pf,
            'esic' => $this->esic,
            'lwf' => $this->lwf,
            'salary_advance' => $this->salary_advance,
            'authorised_signatory' => $this->authorised_signatory,
            'pf_applicable' => $this->pf_applicable,
            'medical_bill_submited' => $this->medical_bill_submited,
            'account_no' => $this->account_no,
            'is_deleted' => 0,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'designation', $this->designation]);

        return $dataProvider;
    }
}
