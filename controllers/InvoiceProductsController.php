<?php

namespace app\controllers;

use Yii;
use app\models\InvoiceProducts;
use app\models\InvoiceProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InvoiceProductsController implements the CRUD actions for InvoiceProducts model.
 */
class InvoiceProductsController extends Controller
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
     * Lists all InvoiceProducts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InvoiceProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InvoiceProducts model.
     * @param integer $Invoice_Id
     * @param integer $Product_Id
     * @param integer $Product_Subcatagory_Id
     * @param integer $Product_Subcatagory_main_category_Id
     * @param integer $Product_Subcatagory_Product_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Invoice_Id, $Product_Id, $Product_Subcatagory_Id, $Product_Subcatagory_main_category_Id, $Product_Subcatagory_Product_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Invoice_Id, $Product_Id, $Product_Subcatagory_Id, $Product_Subcatagory_main_category_Id, $Product_Subcatagory_Product_Id),
        ]);
    }

    /**
     * Creates a new InvoiceProducts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InvoiceProducts();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Invoice_Id' => $model->Invoice_Id, 'Product_Id' => $model->Product_Id, 'Product_Subcatagory_Id' => $model->Product_Subcatagory_Id, 'Product_Subcatagory_main_category_Id' => $model->Product_Subcatagory_main_category_Id, 'Product_Subcatagory_Product_Id' => $model->Product_Subcatagory_Product_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InvoiceProducts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Invoice_Id
     * @param integer $Product_Id
     * @param integer $Product_Subcatagory_Id
     * @param integer $Product_Subcatagory_main_category_Id
     * @param integer $Product_Subcatagory_Product_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Invoice_Id, $Product_Id, $Product_Subcatagory_Id, $Product_Subcatagory_main_category_Id, $Product_Subcatagory_Product_Id)
    {
        $model = $this->findModel($Invoice_Id, $Product_Id, $Product_Subcatagory_Id, $Product_Subcatagory_main_category_Id, $Product_Subcatagory_Product_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Invoice_Id' => $model->Invoice_Id, 'Product_Id' => $model->Product_Id, 'Product_Subcatagory_Id' => $model->Product_Subcatagory_Id, 'Product_Subcatagory_main_category_Id' => $model->Product_Subcatagory_main_category_Id, 'Product_Subcatagory_Product_Id' => $model->Product_Subcatagory_Product_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing InvoiceProducts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Invoice_Id
     * @param integer $Product_Id
     * @param integer $Product_Subcatagory_Id
     * @param integer $Product_Subcatagory_main_category_Id
     * @param integer $Product_Subcatagory_Product_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Invoice_Id, $Product_Id, $Product_Subcatagory_Id, $Product_Subcatagory_main_category_Id, $Product_Subcatagory_Product_Id)
    {
        $this->findModel($Invoice_Id, $Product_Id, $Product_Subcatagory_Id, $Product_Subcatagory_main_category_Id, $Product_Subcatagory_Product_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InvoiceProducts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Invoice_Id
     * @param integer $Product_Id
     * @param integer $Product_Subcatagory_Id
     * @param integer $Product_Subcatagory_main_category_Id
     * @param integer $Product_Subcatagory_Product_Id
     * @return InvoiceProducts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Invoice_Id, $Product_Id, $Product_Subcatagory_Id, $Product_Subcatagory_main_category_Id, $Product_Subcatagory_Product_Id)
    {
        if (($model = InvoiceProducts::findOne(['Invoice_Id' => $Invoice_Id, 'Product_Id' => $Product_Id, 'Product_Subcatagory_Id' => $Product_Subcatagory_Id, 'Product_Subcatagory_main_category_Id' => $Product_Subcatagory_main_category_Id, 'Product_Subcatagory_Product_Id' => $Product_Subcatagory_Product_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
