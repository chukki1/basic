<?php

namespace app\controllers;

use Yii;
use app\models\Order;
use app\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $ID
     * @param integer $Invoice_Id
     * @param integer $Delevery_note_Id
     * @param integer $Customer_Id
     * @param integer $Cashier_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID, $Invoice_Id, $Delevery_note_Id, $Customer_Id, $Cashier_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $Invoice_Id, $Delevery_note_Id, $Customer_Id, $Cashier_Id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'Invoice_Id' => $model->Invoice_Id, 'Delevery_note_Id' => $model->Delevery_note_Id, 'Customer_Id' => $model->Customer_Id, 'Cashier_Id' => $model->Cashier_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID
     * @param integer $Invoice_Id
     * @param integer $Delevery_note_Id
     * @param integer $Customer_Id
     * @param integer $Cashier_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID, $Invoice_Id, $Delevery_note_Id, $Customer_Id, $Cashier_Id)
    {
        $model = $this->findModel($ID, $Invoice_Id, $Delevery_note_Id, $Customer_Id, $Cashier_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'Invoice_Id' => $model->Invoice_Id, 'Delevery_note_Id' => $model->Delevery_note_Id, 'Customer_Id' => $model->Customer_Id, 'Cashier_Id' => $model->Cashier_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID
     * @param integer $Invoice_Id
     * @param integer $Delevery_note_Id
     * @param integer $Customer_Id
     * @param integer $Cashier_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID, $Invoice_Id, $Delevery_note_Id, $Customer_Id, $Cashier_Id)
    {
        $this->findModel($ID, $Invoice_Id, $Delevery_note_Id, $Customer_Id, $Cashier_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID
     * @param integer $Invoice_Id
     * @param integer $Delevery_note_Id
     * @param integer $Customer_Id
     * @param integer $Cashier_Id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $Invoice_Id, $Delevery_note_Id, $Customer_Id, $Cashier_Id)
    {
        if (($model = Order::findOne(['ID' => $ID, 'Invoice_Id' => $Invoice_Id, 'Delevery_note_Id' => $Delevery_note_Id, 'Customer_Id' => $Customer_Id, 'Cashier_Id' => $Cashier_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
