<?php

namespace app\controllers;

use Yii;
use app\models\Receiptno;
use app\models\ReceiptNoSearch;
use yii\web\Controller;
use app\models\Receipt;
use app\models\ReceiptSearch;
use app\models\Model;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;
/**
 * ReceiptNoController implements the CRUD actions for ReceiptNo model.
 */
class ReceiptNoController extends Controller
{
    /** 
     * @inheritdoc
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
     * Lists all ReceiptNo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReceiptNoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ReceiptNo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {   
        
        $model = $this->findModel($id);
        $Receipts = $model->receipts;
        return $this->render('view', [
            'model' => $model,
            'Receipts' => $Receipts,

        ]);
    }

    /**
     * Creates a new ReceiptNo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ReceiptNo();
        $modelsReceipt = [new Receipt];

        if ($model->load(Yii::$app->request->post())) {
           
            $modelsReceipt = Model::createMultiple(Receipt::classname());
            Model::loadMultiple($modelsReceipt, Yii::$app->request->post());

    
            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsReceipt) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                       foreach ($modelsReceipt as $modelReceipt) {
                            $modelReceipt->receiptNo_id = $model->id;
                            if (! ($flag = $modelReceipt->save(false))) {
                                $transaction->rollBack();
                                 break;
                            }
                        }
                    } 
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
         
//return $this->redirect(['view', 'id' => $model->id]);

        }
           
            return $this->render('create', [
                'model' => $model,
                'modelsReceipt' =>(empty($modelsReceipt)) ? [new Receipt] : $modelsReceipt
            ]);
                 
    }
    
       
      

    /**
     * Updates an existing ReceiptNo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return  mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsReceipt = $model->receipts;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $oldIDs = ArrayHelper::map($modelsReceipt, 'id', 'id');
            $modelsReceipt = Model::createMultiple(Receipt::classname(), $modelsReceipt);
            Model::loadMultiple($modelsReceipt, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsReceipt, 'id', 'id')));

              

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsReceipt) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Receipt::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsReceipt as $modelsReceipt) {
                            $modelsReceipt->customer_id = $model->id;
                            if (! ($flag = $modelsReceipt->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
    

        return $this->render('update', [
            'model' => $model,
            'modelsReceipt' => (empty($modelsReceipt)) ? [new Receipt] : $modelsReceipt,

        ]);
    }

    /**
     * Deletes an existing ReceiptNo model.
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
     * Finds the ReceiptNo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ReceiptNo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ReceiptNo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
