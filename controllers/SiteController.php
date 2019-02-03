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
use app\models\ProductList;
use app\models\Invoice;
use app\models\InvoiceHasProduct;
use yii\helpers\Json;
use \DateTime;
use Carbon\Carbon;

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

            return $this->render('cashierDashboard', ['list' => $list]);
            //return $this->render('adminDashboard');
        } else {
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

  

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionAdd()
    {
        $id = $_POST['id'];
        $list = Yii::$app->db->createCommand("SELECT price,id
        FROM product 
        WHERE id = $id")->queryScalar();
        echo $list;
    }

    public function actionSave()
    {
        // echo 'post';
        // die;
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        $discount = $_POST['discount'];
        $total = $_POST['total'];

        $model = new ProductList();

        $model->product_id = $id;
        $model->quantity = $quantity;
        $model->Discount = $discount;
        $model->Total = $total;

        if ($model->save()) {
            $list = Yii::$app->db->createCommand("SELECT PL.*,P.Name 
            FROM product_list PL
            INNER JOIN product P ON P.Id = PL.product_id")->queryAll();
            echo json::encode($list);
        } else {
            print_r($id . '-' . $quantity . '-' . $discount . '-' . $total);
        }

    }

    public function actionRemove()
    {
        Yii::$app->db->createCommand("DELETE FROM `product_list`order by Id desc limit 1")->execute();
        $list = Yii::$app->db->createCommand("SELECT PL.*,P.Name 
            FROM product_list PL
            INNER JOIN product P ON P.Id = PL.product_id")->queryAll();
        echo json::encode($list);
    }

    public function actionClear()
    {
        $invoice = new Invoice();
        $invoice->Date = Carbon::now();
        $invoice->Cashier_Id = $_POST['Cashier_Id'];
        $Customer_Id = $_POST['Customer_Id'];
        if ($Customer_Id != "" || $Customer_Id != null) {
            $invoice->Customer_Id = $Customer_Id;
        }
        $invoice->Net_Total = $_POST['Net_Total'];
        $invoice->No_Of_Items = $_POST['No_Of_Items'];
        $invoice->Paid = $_POST['Paid'];
        $invoice->Balance = $_POST['Balance'];
        if ($invoice->save()) {
            $invoiceId = $invoice->Id;
            $invoice_products = ProductList::find()->all();
            foreach ($invoice_products as $item) {
                $invoiceHasProduct = new InvoiceHasProduct();
                $invoiceHasProduct->Invoice_Id = $invoiceId;
                $invoiceHasProduct->Product_Id = $item->product_id;
                $invoiceHasProduct->Discount = $item->Discount;
                $invoiceHasProduct->Total = $item->Total;
                $invoiceHasProduct->Quantity = $item->quantity;
                if (!$invoiceHasProduct->save()) {
                    return json_encode(['error' => $invoiceHasProduct->getErrors()]);
                }
                ProductList::deleteAll();
            }
            return json_encode(['success' => true]);
        } else {
            return json_encode(['error' => $invoice->getErrors()]);
        }
    }

    public function actionRefresh()
    {
        $list = Yii::$app->db->createCommand("SELECT PL.*,P.Name 
            FROM product_list PL
            INNER JOIN product P ON P.Id = PL.product_id")->queryAll();
        echo json::encode($list);

    }


}






