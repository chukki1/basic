<?php

namespace app\controllers;

use Yii;
use app\models\Cashier;
use app\models\CashierSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CashierController implements the CRUD actions for Cashier model.
 */
class CashierController extends Controller
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
     * Lists all Cashier models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CashierSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cashier model.
     * @param integer $Id
     * @param integer $User_type_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Id, $User_type_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Id, $User_type_Id),
        ]);
    }

    /**
     * Creates a new Cashier model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cashier();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id' => $model->Id, 'User_type_Id' => $model->User_type_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cashier model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Id
     * @param integer $User_type_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Id, $User_type_Id)
    {
        $model = $this->findModel($Id, $User_type_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id' => $model->Id, 'User_type_Id' => $model->User_type_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cashier model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Id
     * @param integer $User_type_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Id, $User_type_Id)
    {
        $this->findModel($Id, $User_type_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cashier model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Id
     * @param integer $User_type_Id
     * @return Cashier the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Id, $User_type_Id)
    {
        if (($model = Cashier::findOne(['Id' => $Id, 'User_type_Id' => $User_type_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
