<?php

namespace app\controllers;

use app\models\Tasks;

use yii\web\Controller;

class TodoController extends Controller
{
    public $layout = 'todo';
    public function actionIndex()
    {
        $result = Tasks::find()->asArray()->all();
        return $this->render('index', ['result' => $result]);
    }
    public function actionAdd($name = null)
    {

        $model = new Tasks;
        $model->name = $name;
        $model->state = 0;
        $model->save();
        return $this->redirect("http://localhost:8888/todo/web/?r=todo/");
    }

    public function actionUpdate($id = null)
    {
        $model = Tasks::find()->where(['id' => $id])->one();
        $model->state = !$model->state;
        $model->save();
        return $this->redirect("http://localhost:8888/todo/web/?r=todo/");
    }


    public function actionDelete($id = null)
    {
        $model = Tasks::find()->where(['id' => $id])->one();
        $model->delete();
        return $this->redirect("http://localhost:8888/todo/web/?r=todo/");
    }


    public function  actionEdit($id = null)
    {
        $result = Tasks::find()->where(['id' => $id])->one();
        return $this->render('card', ['result' => $result]);
    }



    public function actionChange($id = null, $name = null)
    {
        $model = Tasks::find()->where(['id' => $id])->one();
        $model->name = $name;
        $model->save();
        return $this->redirect("http://localhost:8888/todo/web/?r=todo/");
    }


    public function actionDeletedone()
    {
        Tasks::deleteAll(['state' => '1']);
        return $this->redirect("http://localhost:8888/todo/web/?r=todo/");
    }



    public function actionChanges($id = null, $name = null)
    {
        $model = Tasks::find()->where(['id' => $id])->one();
         $model->name=$name;
         $model->save();
        return $this->redirect("http://localhost:8888/todo/web/?r=todo/");
    }
}
