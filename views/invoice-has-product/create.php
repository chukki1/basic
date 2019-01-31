<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InvoiceHasProduct */

$this->title = 'Create Invoice Has Product';
$this->params['breadcrumbs'][] = ['label' => 'Invoice Has Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-has-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
