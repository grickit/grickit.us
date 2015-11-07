<?php

namespace front\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use common\models\LoginForm;
use common\models\SignupForm;
//use common\models\PasswordResetRequestForm;
//use common\models\ResetPasswordForm;

use front\controllers\ThingController;

class SiteController extends Controller {

    public $layout = '//main';

    public function behaviors() {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'denyCallback' => function($rule,$action) { return $action->controller->redirect('index'); },
                'rules' => [
                    ['actions' => ['index','error','login','ausmerica','base'], 'roles' => ['?','@'], 'allow' => true],
                    ['actions' => ['logout','admin'], 'roles' => ['@'], 'allow' => true]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => ['logout' => ['post']],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {
        return $this->redirect(['/']);
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionBase() {
        return $this->render('base');
    }

    public function actionAusmerica() {
        return $this->render('ausmerica');
    }

    public function actionAdmin() {
        return $this->render('admin');
    }

    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /*
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken',['model' => $model]);
    }

    public function actionResetPassword($token)
    {echo "hey sup"; die();

        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    */

}
