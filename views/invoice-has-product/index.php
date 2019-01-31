<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InvoiceHasProductrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoice Has Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-has-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Invoice Has Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Invoice_Id',
            'Product_Id',
            'Quantity',
            'Discount',
            'Total',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
