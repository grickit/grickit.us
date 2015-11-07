<?php

namespace front\controllers;

use Yii;
use common\models\user;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UserController extends Controller {

    public $layout = '//main';

    public function behaviors() {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'denyCallback' => function($rule,$action) { return $action->controller->redirect('index'); },
                'rules' => [
                    ['actions' => ['index','view'], 'roles' => ['?','@'], 'allow' => true],
                    ['actions' => ['create','update','delete'], 'roles' => ['@'], 'allow' => true]
                ]
            ]
        ];
    }

    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => ['pageSize' => 20]
        ]);

        return $this->render('index',['dataProvider' => $dataProvider]);
    }


    public function actionView($name) {
        $model = $this->findModelByName($name);

        return $this->render('view', ['model' => $model]);
    }


    public function actionCreate() {
        $model = new User(['scenario' => 'create']);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['user/view/'.$model->nameSafe]);
        }
        else {
            return $this->render('create', ['model' => $model]);
        }
    }


    public function actionUpdate($id) {
        $model = $this->findModelByID($id);
        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['user/view/'.$model->nameSafe]);
        }
        else {
            return $this->render('update', ['model' => $model]);
        }
    }


    public function actionDelete($id) {
        $this->findModelByID($id)->delete();
        return $this->redirect(['index']);
    }


    protected function findModelByID($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelByName($name) {
        if (($model = User::findOne(['nameSafe' => $name])) !== null) {
            return $model;
        }
        else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}