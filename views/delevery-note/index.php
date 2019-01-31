<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DeleveryNoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Delevery Notes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delevery-note-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Delevery Note', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Created_date',
            'Discription:ntext',
            'Customer_Id',
            'Status',
            //'Administrator_Id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
