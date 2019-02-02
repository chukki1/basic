<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'product_id',
            'quantity',
            'Discount',
            'Total',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
