<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Plan;

class PlanSearch extends Plan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plan_id', 'plan_name', 'plan_validity', 'plan_data', 'plan_price'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Plan::find();

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
        // $query->andFilterWhere([
        //     'plan_id' => $this->plan_id,
        //     'plan_name' => $this->plan_name,
        //     'plan_validity' => $this->plan_validity,
        //     'plan_data' => $this->plan_data,
        //     'plan_price' => $this->plan_price,
        // ]);

        $query->andFilterWhere(['like', 'plan_name', $this->plan_name]);
        $query->andFilterWhere(['like', 'plan_validity', $this->plan_validity]);
        $query->andFilterWhere(['like', 'plan_data', $this->plan_data]);
        $query->andFilterWhere(['like', 'plan_price', $this->plan_price]);

        return $dataProvider;
    }


}

