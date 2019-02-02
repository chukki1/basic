<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $key, $index, $grid) {
            return [
                'style' => "cursor: pointer",
                'id' => $model['ID'],
                'onclick' => 'location.href="'.Yii::$app->urlManager->createUrl('order-details').'&scenario=Order&params="+($order_Id);',
               
            ];  
        },

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'Customer_Id',
            'Date',
            'Time',
            'QR_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
