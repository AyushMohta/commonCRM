<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\Opportunity;
use app\models\Person;
use app\models\Lead;

class OpportunityController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Opportunity::find()->addOrderBy('opportunity_id');

        $dataProvider = new ActiveDataProvider([
            'pagination' => ['pageSize'=>5],
            'query' => $query,
        ]);

        return $this->render('index',[
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate($id)
    {
        $opportunity = new Opportunity();
        $person = new Person();
        if(!$id) {
            if ($person->load(Yii::$app->request->post())) {
                if ($person->validate()) {
                    $person->save();
                }
            }
            $opportunity->person_id = $person->person_id;
            if ($opportunity->load(Yii::$app->request->post())) {
                if ($opportunity->validate()) {
                    $opportunity->save();
                    return $this->redirect('index.php?r=opportunity');
                }
            }
        } else {
            $lead = Lead::findOne($id);
            $opportunity->person_id = $lead->person_id;
            $opportunity->lead_id = $id;
            if ($opportunity->load(Yii::$app->request->post())) {
                if ($opportunity->validate()) {
                    $opportunity->save();
                    return $this->redirect('index.php?r=opportunity');
                }
            }
        }
        return $this->render('create', ['person' => $person, 'opportunity' => $opportunity]);
    }

    public function actionDelete($id)
    {
        $opportunity = Opportunity::findOne($id);
        // $person = Person::findOne($opportunity->person_id);
        $opportunity->delete();
        // $person->delete();
        return $this->redirect('index.php?r=opportunity');
    }

    

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
