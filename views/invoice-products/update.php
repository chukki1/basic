<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InvoiceProducts */

$this->title = 'Update Invoice Products: ' . $model->Invoice_Id;
$this->params['breadcrumbs'][] = ['label' => 'Invoice Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Invoice_Id, 'url' => ['view', 'Invoice_Id' => $model->Invoice_Id, 'Product_Id' => $model->Product_Id, 'Product_Subcatagory_Id' => $model->Product_Subcatagory_Id, 'Product_Subcatagory_main_category_Id' => $model->Product_Subcatagory_main_category_Id, 'Product_Subcatagory_Product_Id' => $model->Product_Subcatagory_Product_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="invoice-products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
