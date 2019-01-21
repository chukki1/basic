<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Id' => $model->Id, 'Subcatagory_Id' => $model->Subcatagory_Id, 'Subcatagory_main_category_Id' => $model->Subcatagory_main_category_Id, 'Subcatagory_Product_Id' => $model->Subcatagory_Product_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Id' => $model->Id, 'Subcatagory_Id' => $model->Subcatagory_Id, 'Subcatagory_main_category_Id' => $model->Subcatagory_main_category_Id, 'Subcatagory_Product_Id' => $model->Subcatagory_Product_Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id',
            'Name',
            'Available_quntity',
            'Reorder_level',
            'Description:ntext',
            'Price',
            'Subcatagory_Id',
            'Subcatagory_main_category_Id',
            'Subcatagory_Product_Id',
        ],
    ]) ?>

</div>
