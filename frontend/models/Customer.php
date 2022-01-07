<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $customer_id
 * @property int|null $opportunity_id
 * @property int|null $plan_id
 *
 * @property Opportunity $opportunity
 * @property Plan $plan
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['opportunity_id', 'plan_id', 'person_id'], 'integer'],
            [['opportunity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Opportunity::className(), 'targetAttribute' => ['opportunity_id' => 'opportunity_id']],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::className(), 'targetAttribute' => ['plan_id' => 'plan_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'opportunity_id' => 'Opportunity ID',
            'plan_id' => 'Plan Name',
            'person_id' => 'Name',
        ];
    }

    /**
     * Gets query for [[Opportunity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOpportunity()
    {
        return $this->hasOne(Opportunity::className(), ['opportunity_id' => 'opportunity_id']);
    }

    /**
     * Gets query for [[Plan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plan::className(), ['plan_id' => 'plan_id']);
    }

    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['person_id' => 'person_id']);
    }
}
