<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\Plan;

class PlanController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Plan::find()->addOrderBy('plan_id');

        $dataProvider = new ActiveDataProvider([
            'pagination' => ['pageSize'=>5],
            'query' => $query,
        ]);

        return $this->render('index',[
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $plan = new Plan();
        if ($plan->load(Yii::$app->request->post())) {
            if ($plan->validate()) {
                $plan->save();
                return $this->redirect('index.php?r=plan');
            }
        }
        return $this->render('create', ['plan' => $plan]);
    }

    public function actionDelete($id)
    {
        $plan = Plan::findOne($id)->delete();
        if($plan) {
          return $this->redirect(['index']);
        }
    }

    

    public function actionUpdate($id)
    {
        $plan = Plan::findOne($id);
        if($plan->load(Yii::$app->request->post()) && $plan->save()) {
          return $this->redirect(['index', 'plan_id' => $plan->plan_id]);
        }
        return $this->render('update',['plan'=>$plan]);
    }

}
