<?php

namespace app\controllers;

use Yii;
use app\models\Subcatagory;
use app\models\SubcatagorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubcatagoryController implements the CRUD actions for Subcatagory model.
 */
class SubcatagoryController extends Controller
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
     * Lists all Subcatagory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubcatagorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subcatagory model.
     * @param integer $Id
     * @param integer $main_category_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Id, $main_category_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Id, $main_category_Id),
        ]);
    }

    /**
     * Creates a new Subcatagory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Subcatagory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id' => $model->Id, 'main_category_Id' => $model->main_category_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Subcatagory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Id
     * @param integer $main_category_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Id, $main_category_Id)
    {
        $model = $this->findModel($Id, $main_category_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id' => $model->Id, 'main_category_Id' => $model->main_category_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Subcatagory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Id
     * @param integer $main_category_Id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Id, $main_category_Id)
    {
        $this->findModel($Id, $main_category_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Subcatagory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Id
     * @param integer $main_category_Id
     * @return Subcatagory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Id, $main_category_Id)
    {
        if (($model = Subcatagory::findOne(['Id' => $Id, 'main_category_Id' => $main_category_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
