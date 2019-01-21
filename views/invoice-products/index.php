<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InvoiceProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoice Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Invoice Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' =>$dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Invoice_Id',
            'Product_Id',
            'Quantity',
            //'Product_Subcatagory_Id',
           // 'Product_Subcatagory_main_category_Id',
            //'Product_Subcatagory_Product_Id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
