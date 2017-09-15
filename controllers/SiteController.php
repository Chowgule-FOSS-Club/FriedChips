<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Url;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $this->layout = 'frontend';
        return $this->render('index');
    }

    /**
     * Login <action class=""></action>
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
        $this->layout = 'product';
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
        $this->redirect(['site/login']);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $this->enableCsrfValidation = false;
        $data = Yii::$app->request->post('data');
        $mydata = json_decode($data , true);
        
        $to = $mydata[0]['email'];
        $subject = "Salgaoncar enquiry";
        $body = "From : " . $mydata[0]['name'] . "<br>";
        $body .= "Email id: " . $mydata[0]['email'] . "<br>";
        $body .= "Comments : " . $mydata[0]['comments'] . "<br>";
        
        if(mail($to,$subject,$body)){
            echo "Your data has been submitted";
        }
        else echo "Sorry! Your Data could not be sent";
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

    public function actionErrorPage()
    {
        $this->layout = "frontend";

        return $this->render(
            'error',
            [
                'name' => 'ACCESS DENIED!',
                'message' => ' You do not have permission to access this resource!',
            ]
        );
    }
}

