<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\Lead;
use app\models\Person;


class LeadController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Lead::find()->addOrderBy('lead_id');

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
        $lead = new Lead();
        $person = new Person();
        if ($person->load(Yii::$app->request->post())) {
            if ($person->validate()) {
                $person->save();
                $lead->person_id = $person->person_id;
                $lead->save();
                return $this->redirect('index.php?r=lead');
            }
        }
        return $this->render('create', ['person' => $person]);
    }
    
    public function actionDelete($id)
    {
        $lead = Lead::findOne($id)->delete();
        if($lead) {
          return $this->redirect(['index']);
        }
    }


    public function actionUpdate($id)
    {
        $lead = Lead::findOne($id);
        $person = Person::findOne($lead->person_id);

        if($person->load(Yii::$app->request->post()) && $person->save()) {
            return $this->redirect(['index', 'lead_id' => $id]);
        }
        return $this->render('update',['person'=>$person]);
    }

}
