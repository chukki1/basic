<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderDetails */

$this->title = 'Create Order Details';
$this->params['breadcrumbs'][] = ['label' => 'Order Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
