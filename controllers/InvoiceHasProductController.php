<?php

namespace app\controllers;

use Yii;
use app\models\InvoiceHasProduct;
use app\models\InvoiceHasProductrSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InvoiceHasProductController implements the CRUD actions for InvoiceHasProduct model.
 */
class InvoiceHasProductController extends Controller
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
     * Lists all InvoiceHasProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InvoiceHasProductrSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
              return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InvoiceHasProduct model.
     * @param integer $Invoice_Id
     * @param integer $Product_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Invoice_Id, $Product_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Invoice_Id, $Product_Id),
        ]);
    }

    /**
     * Creates a new InvoiceHasProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InvoiceHasProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Invoice_Id' => $model->Invoice_Id, 'Product_Id' => $model->Product_Id]);
        }
         
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InvoiceHasProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Invoice_Id
     * @param integer $Product_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Invoice_Id, $Product_Id)
    {
        $model = $this->findModel($Invoice_Id, $Product_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Invoice_Id' => $model->Invoice_Id, 'Product_Id' => $model->Product_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing InvoiceHasProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Invoice_Id
     * @param integer $Product_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Invoice_Id, $Product_Id)
    {
        $this->findModel($Invoice_Id, $Product_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InvoiceHasProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Invoice_Id
     * @param integer $Product_Id
     * @return InvoiceHasProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Invoice_Id, $Product_Id)
    {
        if (($model = InvoiceHasProduct::findOne(['Invoice_Id' => $Invoice_Id, 'Product_Id' => $Product_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
