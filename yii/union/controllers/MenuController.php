<?php
namespace union\controllers;

use Yii;
use union\models\category;
use yii\data\ArrayDataProvider;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class MenuController extends Controller {

    public $layout = '//main';

    public function behaviors() {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'denyCallback' => function($rule,$action) { return $action->controller->redirect('index'); },
                'rules' => [
                    ['actions' => ['index'], 'roles' => ['?','@'], 'allow' => true]
                ]
            ]
        ];
    }

    public function actionIndex() {
        $query = new Query();
        $dataProvider = new ArrayDataProvider([
            'allModels' => $query->select('*')
                ->from('union_categories')
                ->where(['publishedStatus' => 1])
                ->orderBy(['order' => SORT_ASC])
                ->all()
        ]);

        return $this->render('index',['dataProvider' => $dataProvider]);
    }

}