<?php

namespace app\controllers;

use Yii;
use app\models\AddUser;
use app\models\AddUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AddUserController implements the CRUD actions for AddUser model.
 */
class AddUserController extends Controller
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
     * Lists all AddUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AddUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AddUser model.
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
     * Creates a new AddUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AddUser();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Id' => $model->Id, 'User_type_Id' => $model->User_type_Id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AddUser model.
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
     * Deletes an existing AddUser model.
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
     * Finds the AddUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Id
     * @param integer $User_type_Id
     * @return AddUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Id, $User_type_Id)
    {
        if (($model = AddUser::findOne(['Id' => $Id, 'User_type_Id' => $User_type_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
