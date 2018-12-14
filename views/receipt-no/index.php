<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\ReceiptSearch;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ReceiptNoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receipt Nos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receipt-no-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Receipt No', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\ExpandRowColumn',
            'value'  =>function ($model, $key, $index, $column){
                  return GridView::ROW_COLLAPSED;
            },
            'detail' => function($model, $key, $index, $column){
                 $searchModel =new ReceiptSearch();
                 $searchModel->receiptNo_id = $model->id;
                 $dataProvider=$searchModel->search(Yii::$app->request->queryParams);
                 return Yii::$app->controller->renderPartial('_receipts',[

                    'searchModel'=>$searchModel,
                    'dataProvider'=>$dataProvider,
                 ]);
            },
        ],

           
            'receipt_no',
            'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
