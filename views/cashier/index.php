<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CashierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cashiers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cashier-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cashier', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Name',
            'Email:email',
            'Password',
            'User_type_Id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
