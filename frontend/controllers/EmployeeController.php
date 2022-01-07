<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\Employee;
use app\models\Person;
use app\models\EmployeeSearch;

class EmployeeController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $employee = new Employee();
        $person = new Person();
        if ($person->load(Yii::$app->request->post())) {
            if ($person->validate()) {
                $person->save();
                if ($employee->load(Yii::$app->request->post())) {
                    $employee->person_id = $person->person_id;
                    if ($employee->validate()) {
                        $employee->save();
                        return $this->redirect('index.php?r=employee');
                    }
                }
            }
        }
        return $this->render('create', ['person' => $person, 'employee' => $employee]);
    }

    public function actionIndex()
    {
        $searchModel = new EmployeeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

        // $query = Employee::find()->addOrderBy('emp_id');

        // $dataProvider = new ActiveDataProvider([
        //     'pagination' => ['pageSize'=>5],
        //     'query' => $query,
        // ]);

        // return $this->render('index',[
        //     'dataProvider' => $dataProvider
        // ]);
    }

    public function actionUpdate($id)
    {
        $employee = Employee::findOne($id);
        $person = Person::findOne($employee->person_id);

        if($person->load(Yii::$app->request->post()) && $person->save() && $employee->load(Yii::$app->request->post()) && $employee->save()) {
            return $this->redirect(['index', 'emp_id' => $id]);
        }
        return $this->render('update',['person'=>$person, 'employee' => $employee]);
    }

    public function actionDelete($id)
    {
        $employee = Employee::findOne($id)->delete();
        if($employee) {
          return $this->redirect(['index']);
        }
    }

}
