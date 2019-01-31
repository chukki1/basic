<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InvoiceHasProduct */

$this->title = $model->Invoice_Id;
$this->params['breadcrumbs'][] = ['label' => 'Invoice Has Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="invoice-has-product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Invoice_Id' => $model->Invoice_Id, 'Product_Id' => $model->Product_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Invoice_Id' => $model->Invoice_Id, 'Product_Id' => $model->Product_Id], [
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
            'Invoice_Id',
            'Product_Id',
            'Quantity',
            'Discount',
            'Total',
        ],
    ]) ?>

</div>
