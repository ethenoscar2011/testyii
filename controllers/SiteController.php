<?php

namespace ##PROJECT_NAMESPACE##\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use ##PROJECT_NAMESPACE##\models\LoginForm;
use ##PROJECT_NAMESPACE##\models\ContactForm;
use zcore\filters\ZcoreApiAuthFilter;
use zcore\filters\ZcoreLoginAuthFilter;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'apiAuth' => [
                'class' => ZcoreApiAuthFilter::className(),
                'only' => ['api-test']
            ],
            'backendAuth' => [
                'class' => ZcoreLoginAuthFilter::className(),
                'only' => ['backend-test']
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
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

    /**
     * 本地临时登录.
     */
    public function actionLocalLogin()
    {
        Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => '_cpan',
            'value' => 'lugui',
            'expire' => time() + 86400
        ]));
    }

    /**
     * 进行api验证提醒.
     */
    public function actionApiTest()
    {
        echo "Test api auth";
    }

    /**
     * 进行后台验证.
     */
    public function actionBackendTest()
    {
        echo "Test backend auth";
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
