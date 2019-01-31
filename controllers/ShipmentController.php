<?php

namespace app\controllers;

use Yii;
use app\models\Shipment;
use app\models\ShipmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShipmentController implements the CRUD actions for Shipment model.
 */
class ShipmentController extends Controller
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
     * Lists all Shipment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShipmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Shipment model.
     * @param integer $Id
     * @param integer $Administrator_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Id, $Administrator_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Id, $Administrator_Id),
        ]);
    }

    /**
     * Creates a new Shipment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Shipment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id' => $model->Id, 'Administrator_Id' => $model->Administrator_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Shipment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Id
     * @param integer $Administrator_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Id, $Administrator_Id)
    {
        $model = $this->findModel($Id, $Administrator_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id' => $model->Id, 'Administrator_Id' => $model->Administrator_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Shipment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Id
     * @param integer $Administrator_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Id, $Administrator_Id)
    {
        $this->findModel($Id, $Administrator_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Shipment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Id
     * @param integer $Administrator_Id
     * @return Shipment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Id, $Administrator_Id)
    {
        if (($model = Shipment::findOne(['Id' => $Id, 'Administrator_Id' => $Administrator_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
