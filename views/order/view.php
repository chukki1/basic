<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID, 'Invoice_Id' => $model->Invoice_Id, 'Delevery_note_Id' => $model->Delevery_note_Id, 'Customer_Id' => $model->Customer_Id, 'Cashier_Id' => $model->Cashier_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID, 'Invoice_Id' => $model->Invoice_Id, 'Delevery_note_Id' => $model->Delevery_note_Id, 'Customer_Id' => $model->Customer_Id, 'Cashier_Id' => $model->Cashier_Id], [
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
            'ID',
            'QR_code',
            'item_name',
            'Quntity',
            'Unit_Price',
            'Total_Price',
            'created_on',
            'issued_by',
            'created_by',
            'Invoice_Id',
            'Delevery_note_Id',
            'Customer_Id',
            'Cashier_Id',
        ],
    ]) ?>

</div>
