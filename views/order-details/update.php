<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderDetails */

$this->title = 'Update Order Details: ' . $model->order_Id;
$this->params['breadcrumbs'][] = ['label' => 'Order Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_Id, 'url' => ['view', 'id' => $model->order_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
