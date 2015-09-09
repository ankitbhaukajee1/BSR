<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Departments;

/**
 * DepartmentsSearch represents the model behind the search form about `backend\models\Departments`.
 */
class DepartmentsSearch extends Departments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_id'], 'integer'],
            [['department_name', 'department_created_date', 'department_status', 'branch_id', 'company_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Departments::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('branch');
        $query->joinWith('company');

        $query->andFilterWhere([
            'department_id' => $this->department_id,

        ]);

        $query->andFilterWhere(['like', 'department_name', $this->department_name])
            ->andFilterWhere(['like', 'department_created_date', $this->department_created_date])
            ->andFilterWhere(['like', 'branches.branch_name', $this->branch_id])
            ->andFilterWhere(['like', 'companies.company_name', $this->company_id])
            ->andFilterWhere(['like', 'department_status', $this->department_status]);

        return $dataProvider;
    }
}
