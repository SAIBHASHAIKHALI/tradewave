<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Salary;

/**
 * SalarySearch represents the model behind the search form of `app\models\Salary`.
 */
class SalarySearch extends Salary
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'basic_and_da', 'hra', 'overtime', 'overtime_done', 'contribution_to_pf', 'esic', 'lwf', 'salary_advance', 'salary_advance_deducted', 'remaining_leaves', 'leaves_taken'], 'integer'],
            [['date','name', 'employee_id'], 'safe'],
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
        $query = Salary::find();

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
        $query->joinWith('employee');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'basic_and_da' => $this->basic_and_da,
            'hra' => $this->hra,
            'overtime' => $this->overtime,
            'overtime_done' => $this->overtime_done,
            'contribution_to_pf' => $this->contribution_to_pf,
            'esic' => $this->esic,
            'lwf' => $this->lwf,
            'salary_advance' => $this->salary_advance,
            'salary_advance_deducted' => $this->salary_advance_deducted,
            'remaining_leaves' => $this->remaining_leaves,
            'leaves_taken' => $this->leaves_taken,
        ]);

        $query->andFilterWhere(['like','employee.name',$this->employee_id]);
        return $dataProvider;
    }
}
