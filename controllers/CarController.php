<?php

namespace app\controllers;
use app\models\Car;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\CarSearch;
use app\models\User;
class CarController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
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
    public function actionCreate()
    {
        $userDropDown=[];
        $users = User::find()->all();
        foreach ($users as $user) {
            $userDropDown[$user->id] = $user->name;
        }
        $model = new Car();
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                    $searchModel=new CarSearch();
                    return $this->render('carList', [
                        'dataProvider' => $searchModel->search(Yii::$app ->request ->queryParams),
                        'searchModel' => $searchModel
                ]);   
            }
        }
        return $this->render('carForm',['model'=>$model , 'userDropDown'=>$userDropDown]);
    }
     public function actionUpdate($id)
     {
        $userDropDown=[];
        $users = User::find()->all();
        foreach ($users as $user) {
            $userDropDown[$user->id] = $user->name;
        }
        $model = new Car();
                 $model = Car::findOne(['id' => $id]);
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                    $searchModel=new CarSearch();
                    return $this->render('carList', [
                        'dataProvider' => $searchModel->search(Yii::$app ->request ->queryParams),
                        'searchModel' => $searchModel
                ]);   
            }
        }
        return $this->render('UpdateBtn',['model'=>$model , 'userDropDown'=>$userDropDown]);
    }
    public function actionDelete($id)
    {
        $model = Car::findOne(['id' => $id]) -> delete();
        return $this -> redirect(['car']);
    }
    public function actionCar()
    {
        $searchModel = new CarSearch();
        return $this->render('carList', [
            'dataProvider' => $searchModel->search(Yii::$app->request->get()),
            'searchModel' => $searchModel
        ]);
    }
}
