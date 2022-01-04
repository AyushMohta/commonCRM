<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property int $plan_id
 * @property string $plan_name
 * @property string $plan_validity
 * @property string $plan_data
 * @property string $plan_price
 *
 * @property Customer[] $customers
 * @property Opportunity[] $opportunities
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plan_name', 'plan_validity', 'plan_data', 'plan_price'], 'required'],
            [['plan_name', 'plan_data'], 'string', 'max' => 20],
            [['plan_validity'], 'string', 'max' => 30],
            [['plan_price'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'plan_id' => 'Plan ID',
            'plan_name' => 'Plan Name',
            'plan_validity' => 'Plan Validity',
            'plan_data' => 'Plan Data',
            'plan_price' => 'Plan Price',
        ];
    }

    /**
     * Gets query for [[Customers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['plan_id' => 'plan_id']);
    }

    /**
     * Gets query for [[Opportunities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOpportunities()
    {
        return $this->hasMany(Opportunity::className(), ['plan_id' => 'plan_id']);
    }
}
