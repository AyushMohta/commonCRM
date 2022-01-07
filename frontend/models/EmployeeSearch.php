<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employee;
use app\models\Person;

class EmployeeSearch extends Employee
{
    /**
     * {@inheritdoc}
     */
    public $name;
    public function rules()
    {
        return [
            [['emp_id', 'name', 'designation', 'salary'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $this->load($params);

        $query = Employee::find();
        $query->joinWith(['person']);
        $query->andFilterWhere(['like', 'person.name', $this->name]);


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        echo $query->createCommand()->rawSql; // to see the query..

        

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

        $query->andFilterWhere(['like', 'emp_id', $this->emp_id]);
        $query->andFilterWhere(['like', 'designation', $this->designation]);
        $query->andFilterWhere(['like', 'salary', $this->salary]);

        return $dataProvider;
    }

    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['person_id' => 'person_id']);
    }


}

