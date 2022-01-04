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

class CustomerController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Customer::find()->addOrderBy('customer_id');

        $dataProvider = new ActiveDataProvider([
            'pagination' => ['pageSize'=>5],
            'query' => $query,
        ]);

        return $this->render('index',[
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionUpdate($id)
    {
        return $this->render('update');
    }

    public function actionDelete($id)
    {
        return $this->render('update');
    }

}
