<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\Customer;
use app\models\Opportunity;

class CustomerController extends \yii\web\Controller
{
    public function actionIndex($id=0)
    {
        if($id == 0) {
            $query = Customer::find()->addOrderBy('customer_id');

            $dataProvider = new ActiveDataProvider([
                'pagination' => ['pageSize'=>5],
                'query' => $query,
            ]);

            return $this->render('index',[
                'dataProvider' => $dataProvider
            ]);
        }
        else {
            $customer = new Customer;
            $opportunity = Opportunity::findOne($id);
            $customer->person_id = $opportunity->person_id;
            $customer->plan_id = $opportunity->plan_id;
            $customer->opportunity_id = $id;
            
            $customer->save();

            return $this->redirect('index.php?r=customer');
        }
    }

    public function actionUpdate($id)
    {
        return $this->render('update');
    }

    public function actionDelete($id)
    {
        $customer = Customer::findOne($id);
        $customer->delete();
        return $this->redirect('index.php?r=customer');
    }

}
