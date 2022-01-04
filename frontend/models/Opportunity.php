<?php

namespace app\models;
// namespace app\models\Plan;

use Yii;
use app\models\Plan;
use app\models\Person;
use app\models\Lead;

/**
 * This is the model class for table "opportunity".
 *
 * @property int $opportunity_id
 * @property string $created_at
 * @property int|null $lead_id
 * @property int|null $person_id
 * @property int|null $plan_id
 *
 * @property Customer[] $customers
 */
class Opportunity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'opportunity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lead_id', 'person_id', 'plan_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'opportunity_id' => 'Opportunity ID',
            'created_at' => 'Created At',
            'lead_id' => 'is_Lead',
            'person_id' => 'Name',
            'plan_id' => 'Plan Name',
        ];
    }

    /**
     * Gets query for [[Customers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plan::className(), ['plan_id' => 'plan_id']);
    }

    public function getLead()
    {
        return $this->hasOne(Lead::className(), ['lead_id' => 'lead_id']);
    }

    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['person_id' => 'person_id']);
    }
}
