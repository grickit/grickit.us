<?php

namespace front\controllers;

use Yii;
use front\models\article;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ArticleController extends Controller {

    public $layout = '//main';

    public function behaviors() {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'denyCallback' => function($rule,$action) { return $action->controller->redirect('/'); },
                'rules' => [
                    ['actions' => ['index','view','tagged'], 'roles' => ['?','@'], 'allow' => true],
                    ['actions' => ['create','update','delete'], 'roles' => ['@'], 'allow' => true]
                ]
            ]
        ];
    }

    public function actionIndex() {
        $query = new Query();
        $dataProvider = new ArrayDataProvider([
            'allModels' => $query->select('*')
                ->from('front_articles')
                ->where(['publishedStatus' => 1])
                ->orderBy(['createDate' => SORT_DESC])
                ->all()
        ]);

        return $this->render('index',['dataProvider' => $dataProvider]);
    }

    public function actionTagged($tag) {
        $query = new Query();
        $dataProvider = new ArrayDataProvider([
            'allModels' => $query->select('front_articles.*')
                ->from('front_articles')
                ->leftJoin('common_tags','`common_tags`.`modelID` = `front_articles`.`id` AND `common_tags`.`modelType` = \'front\\\models\\\article\'')
                ->where(['common_tags.nameSafe' => $tag])
                ->orderBy(['front_articles.createDate' => SORT_DESC])
                ->all()
        ]);

        return $this->render('index',['dataProvider' => $dataProvider]);
    }

    public function actionView($name) {
        $model = $this->findModelByName($name);

        if(isset($_POST['like']) && $_POST['like'] == $model->id && $model->like()) {
            $model->save();
        }
        elseif(isset($_POST['unlike']) && $_POST['unlike'] == $model->id && $model->unlike()) {
            $model->save();
        }

        return $this->render('view', ['model' => $model]);
    }


    public function actionCreate() {
        $model = new article(['scenario' => 'create']);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['article/view/'.$model->nameSafe]);
        }
        else {
            return $this->render('create', ['model' => $model]);
        }
    }


    public function actionUpdate($id) {
        $model = $this->findModelByID($id);
        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['article/view/'.$model->nameSafe]);
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
        if (($model = article::findOne($id)) !== null) {
            return $model;
        }
        else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelByName($name) {
        if (($model = article::findOne(['nameSafe' => $name])) !== null) {
            return $model;
        }
        else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}