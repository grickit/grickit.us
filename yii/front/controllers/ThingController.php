<?php

namespace front\controllers;

use Yii;
use front\models\thing;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ThingController extends Controller {

    public $layout = '/../../../common/views/layouts/main';

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
        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT * FROM front_things ORDER BY ((GREATEST((30-((UNIX_TIMESTAMP(UTC_TIMESTAMP()) - UNIX_TIMESTAMP(updateDate))/86400)),0)) + (LOG10(voteCount+1)*(voteCount/((UNIX_TIMESTAMP(UTC_TIMESTAMP()) - UNIX_TIMESTAMP(createDate))/86400))*10)) DESC',
        ]);

        return $this->render('index',['dataProvider' => $dataProvider]);
    }


    public function actionView($name) {
        return $this->render('view', ['model' => $this->findModelByName($name)]);
    }


    public function actionCreate() {
        $model = new thing();
        $model->activeStatus = 1;
        $model->createDate = date('Y-m-d H:i:s',time());
        $model->updateDate = date('Y-m-d H:i:s',time());

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['thing/view/'.$model->nameSafe]);
        }
        else {
            return $this->render('create', ['model' => $model]);
        }
    }


    public function actionUpdate($id) {
        $model = $this->findModelByID($id);
        $model->updateDate = date('Y-m-d H:i:s',time());

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['thing/view/'.$model->nameSafe]);
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
        if (($model = thing::findOne($id)) !== null) {
            return $model;
        }
        else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelByName($name) {
        if (($model = thing::findOne(['nameSafe' => $name])) !== null) {
            return $model;
        }
        else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}