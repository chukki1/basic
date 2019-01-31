<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shipments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Shipment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Date',
            'Time',
            'Discription:ntext',
            'Suplier',
            'Item_Id',
            'Quantity',
            'Administrator_Id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
