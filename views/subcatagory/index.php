<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubcatagorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subcatagories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcatagory-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Subcatagory', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Name',
            'Status',
            'main_category_Id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
