<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InvoiceHasProduct */

$this->title = 'Update Invoice Has Product: ' . $model->Invoice_Id;
$this->params['breadcrumbs'][] = ['label' => 'Invoice Has Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Invoice_Id, 'url' => ['view', 'Invoice_Id' => $model->Invoice_Id, 'Product_Id' => $model->Product_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="invoice-has-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
