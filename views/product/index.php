<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Product', ['value'=>Url::to('create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
      <?php
        Modal::begin([
            'header'=>'<h4>Products</h4>',
            'id'=>'modal',
            'size'=>'modal-lg',
        ]);
        echo "<div id='modalContent'></div>";

        Modal::end();
      ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'Id',
            'Name',
            'Description:ntext',
            'Price',
            //'Subcatagory_Id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
