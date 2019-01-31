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
use yii\db\Command;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
       
       
        if (!Yii::$app->user->isGuest) {
       // return $this->render('index');
          $list = Yii::$app->db->createCommand("select Id,Name,Price from product")->queryAll();
         
          return $this->render('cashierDashboard',['list'=>$list]);
        //  return $this->render('adminDashboard');
        }
        else{
        return $this->redirect(['/user-management/auth/login']);
        }
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
    public function actionCashierDashBoard()
    {
        $model = new InvoiceHasProduct();
        $list = Yii::$app->db->createCommand("select Id,Name,Price from product")->queryAll();
         return $this->render('cashierDashboard',['list'=>$list]);

      
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


    public function actionAdd(){
        $id = $_POST['id'];
        $list = Yii::$app->db->createCommand("SELECT price,id
        FROM product 
        WHERE id = $id")->queryScalar();
        echo $list;        
    }

    public function actionSave(){
        $id = $_POST['id'];
        $quantity=$_POST['quantity'];
        $discount=$_POST['discount'];
        $total=$_POST['total'];

        $list = array();
        $list[0] = $id;
        $list[1] = $quantity;
        $list[2] = $discount;
        $list[3] = $total;
        
        echo $list;

        Yii::$app->db->createCommand("INSERT INTO `invoice_has_product`(`Product_Id`, `Quantity`, `Discount`, `Total`) VALUES ($id,$quantity,$discount,$total)");
        
        $list = Yii::$app->db->createCommand("SELECT * FROM invoice_has_product")->queryAll();
        echo $list;      
    }

    public function actionAddProduct(){
        $list2=$this->con->prepare("INSERT INTO `invoice_has_product`(`Product_Id`, `Quantity`, `Discount`, `Total`) 
        VALUES (?,?,?,?)");
    }
    
    
  
}







