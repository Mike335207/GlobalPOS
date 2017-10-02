<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\ContactForm;
use app\models\ReportsForm;
use app\models\User;
use yii\helpers\Url;
use yii\web\ForbiddenHttpException;
use app\models\AuthItem;

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
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'signup', 'about', 'contact', 'reports'],
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
	
	
	/*public function behaviors()
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
    }*/
	
	

    /**
     * @inheritdoc
     */
    public function actions()
    {
        //$this->layout = 'loginLayout';
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
        return $this->render('index');
		
		//$loginForm = new LoginForm();
		//$this->render('index', array('loginForm'=>$loginForm));
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'loginLayout';
		if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
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
	
	 /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
	if(Yii::$app->user->can('create-user'))
	{
		$model = new SignupForm();
		$authItems = AuthItem::find()->all();
		
		if ($model->load(Yii::$app->request->post())) {
		    if ($user = $model->signup()) {
		        if (Yii::$app->getUser()->login($user)) {
		            return $this->goHome();
		        }
		    }
		}

		return $this->render('signup', [
		    'model' => $model,
				'authItems' => $authItems,
        ]);
	} else throw new ForbiddenHttpException;
    }

     /**
     * Displays reports page.
     *
     * @return string
     */
    public function actionReports()
    {
        $model = new ReportsForm();
	if ($model->load(Yii::$app->request->post()) && $model->setUrl()) {
            return $this->redirect($model->getUrl());
	    //return $model->getDate();
        }

 	return $this->render('reports', [
            'model' => $model,
        ]);
    }
	
}



