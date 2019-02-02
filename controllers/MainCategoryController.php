<?php

namespace app\controllers;

use Yii;
use app\models\MainCategory;
use app\models\MainCategorySearch;
use yii\web\Controller;
use app\models\Subcatagory;
use app\models\SubcatagorySearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;
/**
 * MainCategoryController implements the CRUD actions for MainCategory model.
 */
class MainCategoryController extends Controller
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
     * Lists all MainCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MainCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MainCategory model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MainCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MainCategory();
        $modelsSub=[new Subcatagory];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $modelsSub = Model::createMultiple(Subcatagory::classname());
            Model::loadMultiple($modelsSub, Yii::$app->request->post());

          

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsSub) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsSub as $modelSub) {
                            $modelSub->main_category_Id = $model->Id;
                            if (! ($flag = $modelSub->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->Id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }


       // if ($model->load(Yii::$app->request->post()) && $model->save()) {
         //   return $this->redirect(['view', 'id' => $model->Id]);
       // }
        else{
        return $this->render('create', [
            'model' => $model,
            'modelsSub' => (empty($modelsSub)) ? [new Subcatagory] : $modelsSub]);
        }
    }

    /**
     * Updates an existing MainCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MainCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MainCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MainCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MainCategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
