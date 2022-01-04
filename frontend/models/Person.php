<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $person_id
 * @property string $name
 * @property string $gender
 * @property string|null $date_of_birth
 * @property string|null $email
 * @property int $contact_no
 * @property string|null $address
 *
 * @property Employee[] $employees
 * @property Lead[] $leads
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'gender', 'contact_no'], 'required'],
            [['date_of_birth'], 'safe'],
            [['contact_no'], 'integer'],
            [['name'], 'string', 'max' => 25],
            [['gender'], 'string', 'max' => 1],
            [['email'], 'string', 'max' => 32],
            [['address'], 'string', 'max' => 35],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'person_id' => 'Person ID',
            'name' => 'Name',
            'gender' => 'Gender',
            'date_of_birth' => 'Date Of Birth',
            'email' => 'Email',
            'contact_no' => 'Contact No',
            'address' => 'Address',
        ];
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['person_id' => 'person_id']);
    }

    /**
     * Gets query for [[Leads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeads()
    {
        return $this->hasMany(Lead::className(), ['person_id' => 'person_id']);
    }
}
